@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">product</div>

                    <div class="panel-body">
                        Coming soon...
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-heading">product</div>

        <div class="panel-body table-responsive">
            <router-view name="productsIndex"></router-view>
            <router-view></router-view>
        </div>
    </div>
@endsection
