<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Log;
use Interpro\Entrance\Contracts\Extract\ExtractAgent;


class AdminController extends Controller
{
    private $extract;
    public function __construct(ExtractAgent $ext){
        $this->extract = $ext;
        $this->extract->tuneSelection('slider')->sortBy('id','DESC');
        $this->extract->tuneSelection('place')->sortBy('id','DESC');
    }


    public function getIndex(){
        return view('back.layout');
    }

    public function getAll(){
        $static_all_site = $this->extract->getBlock('static_all_site');
        return view('back.blocks.static_all_site',[
           'static_all_site' => $static_all_site
        ]);
    }
    public function getSlider(){
        $slider = $this->extract->getBlock('head_slider');
        return view('back.blocks.head_slider', [
            'head_slider' => $slider
        ]);
    }
    public function getGallery(){
        $gallery = $this->extract->getBlock('gallery_block');
        return view('back.blocks.gallery_block', [
            'gallery_block' => $gallery
        ]);
    }
    public function getInterest(){
        $interest = $this->extract->getBlock('interest_place');
        return view('back.blocks.interest_place', [
            'interest_place' => $interest
        ]);
    }
    public function getMap(){
        $map = $this->extract->getBlock('map_block');
        return view('back.blocks.map_block', [
            'map_block' => $map
        ]);
    }
    public function getFlats(){
        $flats = $this->extract->getBlock('flats_block');
        return view('back.blocks.flats_block', [
            'flats_block' => $flats
        ]);
    }
    public function getFlatsItem( $id ){
        $flat_item = $this->extract->getGroupItem('flat', $id);
        return view('back.groups.flat.flat', [
           'item' => $flat_item
        ]);
    }
    public function getGalleryItem( $id ){
        $gallery_type_item = $this->extract->getGroupItem('gallery_type', $id);
        return view('back.groups.gallery_type.gallery_type', [
           'item' => $gallery_type_item
        ]);
    }
}