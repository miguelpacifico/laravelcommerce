@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">

            <h2 class="title text-center">Detalhes do Pedido Numéro: {{$order->id}}</h2>
            <p><strong>Data do Pedido: {{ date('d/m/Y',strtotime($order->created_at)) }}</strong></p>
            <p><strong>Nome: {{ $order->user->name }}</strong></p>

            <div class="table-responsive cart_info">


                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="description">Produto</td>
                        <td class="price">Quatidade</td>
                        <td class="price">Valor</td>
                        <td class="price">Sub-Total</td>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($order->items->all() as $k=>$item)
                        <tr>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product',['id'=>$k]) }}">{{ $item->product->name }}</a> </h4>
                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_quantity">
                                {{$item['qtd']}}

                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">R$ {{ number_format($item->price,2,",",".") }}</p>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">R$ {{ number_format($item->price * $item->qtd,2,",",".") }}</p>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="" colspan="4">
                                <p>Nenhum pedido encontrado.</p>
                            </td>
                        </tr>
                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="4">
                            <div class="pull-right">
                                    <span>
                                        TOTAL: R$ {{ number_format($order->total,2,",",".") }}
                                    </span>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>









            </div>
        </div>
    </section>
@stop
