@extends('layouts.app')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('header')
    <h2>
        الرئيسية
    </h2>
@endsection

@section('content')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-b border-gray-200 bg-white shadow-md sm:rounded-lg height overflow-hidden screen">
                <table class="table-orders">
                    <thead>
                    <tr class="table-head">
                        <th class="column1">الرقم</th>
                        <th class="column1">التاريخ</th>
                        <th class="column1">المنتج</th>
                        <th class="column2">الإسم واللقب</th>
                        <th class="column3">العنوان</th>
                        <th class="column4">الولاية</th>
                        <th class="column5">رقم الهاتف</th>
                        <th class="column6">السعر</th>
                        <th class="column6">الحالة</th>
                        <th class="column6">أدوات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="order-id">{{$order->id}}</td>
                            <td class="order-created_at">{{$order->created_at}}</td>
                            <td class="order-img">
                                <img src="{{'/picture/product/'.$order->img}}"/>
                            </td>
                            <td class="order-full_name">{{$order->full_name}}</td>
                            <td class="order-adresse">{{$order->adresse}}</td>
                            <td class="order-wilaya">{{$order->wilaya}}</td>
                            <td class="order-phone">{{$order->phone}}</td>
                            <td class="order-prix">{{$order->prix}}</td>
                            <td class="order-status">
                                @if ($order->status == 1)
                                    <span class="confirmed-order"></span>
                                @elseif ($order->status == 2)
                                    <span class="pending-order"></span>
                                @elseif ($order->status == 0)
                                    <span class="canceled-order"></span>
                                @endif
                            </td>
                            <td class="order-action">
                                @if ($order->status == 2)
                                    <a class="refuse-order" href="{{route('refuse-order', ['id' => $order->id])}}"></a>
                                    <a class="accept-order" href="{{route('accept-order', ['id' => $order->id])}}"></a>
                                @else
                                    <a class="annulled-order" href="{{route('annulled-order', ['id' => $order->id])}}">إلغاء</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
