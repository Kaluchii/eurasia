@extends('front.layout')
@include('front.advantages.meta')
@section('content')
    <section class="content">
        <div class="wrapper">
            <div class="page-title"><h1>Преимущества</h1></div>
            <div class="advantages">
                <div class="col-1-2">
                    @foreach($advantages->advantage_group->odd() as $item)
                        <div class="advantages-item">
                            <div class="img-wrap"><img src="{{$item->advantage_field->link}}" alt="{{$item->advantage_field->alt}}"></div>
                            <h3 class="title">{{$item->title_field}}</h3>
                            <div class="text-block">{!! $item->descr_field !!}</div>
                            @if($item->green_title_field)
                                <div class="green-block">
                                    <p class="big-title">{{$item->green_title_field}}</p>
                                    <p class="text">{{$item->green_text_field}}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    {{--<div class="advantages-item">
                        <div class="img-wrap"><img src="/img/car.png" alt=""></div>
                        <h3 class="title">Усиленная сейсмостойкость</h3>
                        <div class="text-block"><p>

                                При строительстве применены передовые технологии и выполнены антисейсмические мероприятия в
                                соотстветствии со СНиП РК «Строительство в сейсмических районах».

                                Реальная сейсмостойкость
                                свыше 9 баллов

                                Фундаментом является монолитная железобетонная плита высотой 180 см, усиленная перекрестными
                                фундаментальными лентами. Поперечные и продольные несущие стены толщиной 50 см объеденены
                                монолитными перекрытиями тощиной 20 см.</p></div>
                        <div class="green-block">
                            <p class="big-title">90%</p>
                            <p class="text">

                                конструкции жилого
                                комплекса — монолит</p>
                        </div>
                    </div>
                    <div class="advantages-item">
                        <div class="img-wrap"><img src="/img/infr.png" alt=""></div>
                        <h3 class="title">Собственная инфраструктура</h3>
                        <div class="text-block"><p>

                                Инфраструктура «Евразии» спроектирована так, чтобы жильцы получили максимум услуг для
                                повседневной жизни и удовлетворения бытовых нужд не покидая комплекса. На территории
                                запланированы:

                                — Супермаркет
                                — Ателье пошива одежды
                                — Салон красоты
                                — Кофейня
                                — Аптека
                                — Кулинарная студия
                                — Химчистка
                                — Центр детского развития
                                и другое.</p>
                        </div>
                    </div>--}}
                </div>
                <div class="col-1-2">
                    @foreach($advantages->advantage_group->even() as $item)
                        <div class="advantages-item">
                            <div class="img-wrap"><img src="{{$item->advantage_field->link}}" alt="{{$item->advantage_field->alt}}"></div>
                            <h3 class="title">{{$item->title_field}}</h3>
                            <div class="text-block">{!! $item->descr_field !!}</div>
                            @if($item->green_title_field)
                                <div class="green-block">
                                    <p class="big-title">{{$item->green_title_field}}</p>
                                    <p class="text">{{$item->green_text_field}}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    {{--<div class="advantages-item">
                        <div class="img-wrap"><img src="/img/tree.png" alt=""></div>
                        <h3 class="title">Безопасный внутренний двор</h3>
                        <div class="text-block"><p>

                                Современный жилой комплекс — это не только комфортная квартира, но и комфортный двор. В городе
                                трудно найти спокойный уголок, защищенный от автомобилей и случайных прохожих, где дети могут
                                играть в безопасности.

                                В ЖК «Евразия» воплощена концепция «закрытого двора», предусматривающая ограничение доступа во
                                двор автомобилей и посторонних лиц, за исключением экстренных служб.</p>
                        </div>
                        <div class="green-block">
                            <p class="big-title">360</p>
                            <p class="text">

                                парковочных мест
                                на территории комплекса</p>
                        </div>
                    </div>
                    <div class="advantages-item">
                        <div class="img-wrap"><img src="/img/vozm.png" alt=""></div>
                        <h3 class="title">Возможности для бизнеса</h3>
                        <div class="text-block"><p>

                                Состоятельная аудитория «Евразии» более 2 000 человек — 660 квартир и десяток коммерческих
                                помещений, инфраструктура и расположение создают возможности для семейного бизнеса сферы услуг
                                на территории жилого комплекса.

                                В продаже коммерческие
                                площади от 240 до 10 000 м²</p>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
        <div class="buying-wrap advantage-page">
            <div class="buying">
                <div class="text-wrap">
                    <h3 class="title">Комфортные возможности покупки</h3>
                    <div class="col-1"><p>При покупке квартиры или коммерческого помещения, доступна <b>рассрочка под 0%</b> до 12
                            месяцев. Первоначальный взнос от 30%.</p></div>
                    <div class="col-2"><p>Комплекс введен в эксплуатацию, поэтому <b>ипотеку до 20 лет</b> можно взять в любом
                            казахстанском банке.</p></div>
                </div>
            </div>
        </div>
    </section>
@endsection