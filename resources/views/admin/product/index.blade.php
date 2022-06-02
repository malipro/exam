@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-left">filter</div>

                    <div class="card-body">
                        <form action="{{ url()->current() }}" >

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Name</label>
                                        <input type="text" autofocus class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" for="start_price">Price from</label>
                                        <input type="text" name="start_price" id="start_price" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" for="end_price">to</label>
                                        <input type="text" name="end_price" id="end_price" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <!-- Col -->
                            </div><!-- Row -->
                            <button type="submit" class="btn btn-success submit">submit</button>
                            <a class="btn btn-danger" style="text-decoration: none;" href="{{ url()->current() }}">clear filter</a>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-left">products list</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>color</th>
                                    <th>price</th>
                                    <th>description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $index => $product)
                                    @foreach($product->prices as $price)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>
                                            {{$price->color->name}}
                                        </td>
                                        <td>
                                            {{$price->price}}
                                        </td>

                                        <td>
                                            {{$product->short_description}}
                                        </td>
                                    </tr>

                                    <div class="modal inmodal" id="description{{$product->id}}" tabindex="-1"
                                         role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">

                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <h4 class="modal-title d-block">description of <span
                                                            class="f-blue">{{$product->name}}</span></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{$product->description}}</p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
