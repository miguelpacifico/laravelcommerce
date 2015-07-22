@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Valor</td>
                            <td class="price">Quantidade</td>
                            <td class="price">Total</td>
                            <td class="price"></td>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('store.product',['id'=>$k]) }}">
                                    <img src="{{ $item['image'] }}" alt="" width="200" />
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product',['id'=>$k]) }}">{{ $item['name'] }}</a> </h4>
                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ number_format($item['price'],2,",",".") }} kk
                            </td>
                            <td class="cart_quantity">
                                {{$item['qtd']}}

                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="window.location.href='{{ route('cart.add',['id'=>$k]) }}'">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                </button>

                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="window.location.href='{{ route('cart.remove',['id'=>$k]) }}'">
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                </button>

                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">R$ {{ $item['price'] * $item['qtd'] }}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy',['id' => $k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="" colspan="6">
                                    <p>Nenhum item  encontrado.</p>
                                </td>
                            </tr>
                        @endforelse

                        <tr class="cart_menu">
                            <td colspan="6">
                                <div class="pull-right">
                                    <span>
                                        TOTAL: R$ {{ $cart->getTotal() }}
                                    </span>

                                    <a href="{{ route('checkout.place') }}" class="btn btn-success">Fechar a Conta</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop
