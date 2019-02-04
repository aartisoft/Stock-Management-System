@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-md-4">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel">
                    <div class="miniStats--header bg-darker">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#2bb3c0">5,6,9,4,9,5,3,5,9,15,3,2,2,3,9,11,9,7,20,9,7,6</p>

                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-sort-numeric-down text-blue"></i>

                        <h3 class="miniStats--title h4">Total Items</h3>
                        <p class="miniStats--num text-blue">{{ $total_items}}</p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel">
                    <div class="miniStats--header bg-darker">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#e16123">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>


                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-sort-numeric-down  text-orange"></i>


                        <h3 class="miniStats--title h4">Total Stock In</h3>
                        <p class="miniStats--num text-orange">{{ $total_stockIn }}</p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel">
                    <div class="miniStats--header bg-darker">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#009378">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>


                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-sort-numeric-up text-green"></i>


                        <h3 class="miniStats--title h4">Total Stock Out</h3>
                        <p class="miniStats--num text-green">{{ $total_stockOut }}</p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>

        <div class="col-xl-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-success">Companies</h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table style--2">
                            <thead>
                            <tr>
                                <th class="text-info">#</th>
                                <th class="text-info">Name</th>
                                <th class="text-info">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $key=>$company)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        {{ $company->name }}
                                    </td>
                                    <td>
                                        {{ $company->status }}
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <a href="{{ route('company.index') }}" class="addProduct btn btn-lg btn-rounded btn-success">
                        view All Companies</a>
                </div>


            </div>
        </div>
        <div class="col-xl-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-success">Categories</h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table style--2">
                            <thead>
                            <tr>
                                <th class="text-info">#</th>
                                <th class="text-info">Name</th>
                                <th class="text-info">Parent Name</th>
                                <th class="text-info">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key=>$category)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent['name']?$category->parent['name']:'self'}}</td>
                                    <td>{{ $category->status }}</td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <a href="{{ route('category.index') }}" class="addProduct btn btn-lg btn-rounded btn-success">
                        view All Categories</a>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-success">Items</h3>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table style--2">
                            <thead>
                            <tr>
                                <th class="text-info">#</th>
                                <th class="text-info">Item Name</th>
                                <th class="text-info">Company Name</th>
                                <th class="text-info">Category Name</th>
                                <th class="text-info">Unit Price</th>
                                <th class="text-info">Available Quantity</th>
                                <th class="text-info">Total Price</th>
                                <th class="text-info">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key=>$item)

                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->relCompany->name }}</td>
                                    <td>{{ $item->relCategory->name }}</td>
                                    <td>{{ $item->unit_price }}</td>
                                    <td>{{ $item->available_quantity }}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>{{ $item->status }}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <a href="{{ route('item.index') }}" class="addProduct btn btn-lg btn-rounded btn-success">view All Items</a>
                </div>
            </div>
        </div>

    </div>
@endsection

