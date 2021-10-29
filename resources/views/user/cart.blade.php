@extends('layauts.admin')

@section('title', 'Shoping Cart')
@section('pageTitle', 'Shopping Cart')



@section('status')
    @if(session('status'))
        <x-alert>
            <p>
            {{ session('status') }}
            </p>
      </x-alert>
    @endif   
    @if(session('status-_danger'))
        <div class="alert alert-danger" style="font-size:18px;">
            <p>
            {{ session('status-_danger') }}
            </p>
        </div>    
    @endif   
@endsection
<style>
   
   
   .img-cart {
    display: block;
    max-width: 50px;
    height: auto;
    margin-left: auto;
    margin-right: auto;
    }
    table tr td{
        border:1px solid #FFFFFF;    
    }

    table tr th {
        background:#eee;    
    }

    .panel-shadow {
        box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
    }
</style>
@section('content')

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey text-center">
    <div class="col-md-9 col-sm-8 content">
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info panel-shadow">
                    <div class="panel-heading">
                        <h3>
                            <img class="img-circle img-thumbnail" width="120px" src="https://us.123rf.com/450wm/robuart/robuart1712/robuart171200953/91101327-shopping-fun-for-everyone-cartoon-woman-with-cart.jpg?ver=6">
                            Welcome, To Your Shoping Cart
                        </h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('Product')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Qty')}}</th>
                                <th></th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Total')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td><img src="{{asset('images/'. $item->product->image_path)}}" class="img-cart"></td>
                                    <td><strong>{{$item->product->name}}</strong><p>Size : 26</p></td>
                                    <td>
                                    <form class="form-inline" action="{{ route('quantity.update',$item->id) }}" method="post">
                                         @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <input class="form-control" type="text" value="{{$item->quantity}}" name="quantity">
                                            
                                        <button  class="btn btn-default" type="submit"  ><a href="#"><i class="fa fa-pencil" style="color:black;"></i></a></button>
                                    </form>
                                    </td>
                                    <td>
                                        <form class="form-inline" action="{{ route('item.destroy',$item->product->id) }}" method="post" onsubmit="return ConfirmDelete()">
                                            @csrf
                                            @method('delete')    
                                            <button  class="btn btn-primary" type="submit"  ><a href="#"><i class="fa fa-trash-o" style="color:white;"></i></a></button>
                                        </form>
                                    </td>
                                    <td>${{$item->product->price}}</td>
                                    <td>${{$item->product->price * $item->quantity}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">{{__('Total Product')}}</td>
                                    <td>${{$total}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Total Shipping</td>
                                    <td>$2.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total</strong></td>
                                    <td>${{$total - 2}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <a href="{{route('checkout.create')}}" class="btn btn-primary pull-right">Continue Shopping<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function ConfirmDelete()
    {
        return confirm("are you sure ?");
    }
</script>
@endsection    
