@extends('store.store')

@section('content')
    <div class="col-sm-9 padding-right">

        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200" />


                                <h2>R$ 35,33}</h2>
                                <p>NOME</p>
                                <a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ </h2>
                                    <p>345</p>
                                    <a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div><!--recommended-->

    </div>
@stop