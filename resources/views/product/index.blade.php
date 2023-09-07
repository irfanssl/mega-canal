@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2">
            <h3>Product list</h3>
        </div>
        <div class="col-8">&nbsp;</div>
        <div class="col-2 text-end">
            <button class="btn btn-primary" id="showProducts">Show produtcs</button>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col">
            <table class="table table-striped align-middle table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Image</th>
                        <th>Title</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Brand</th>
                        <th class="text-end">Stock</th>
                        <th class="text-end">Price</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="productsTable">

                    {{-- just comement this for refference --}}
                    {{-- <tr>
                        <td>
                            <img src="" alt="" style="width: 180px; height: 150px">
                        </td>
                        <td></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-end"></td>
                        <td class="text-end"></td>
                        <td class="text-center">
                           <button class="btn btn-sm btn-primary" id="viewProduct" product-id="1">View</button>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
            <button class="btn btn-sm btn-primary d-none" id="loadMore">load more</button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        {{-- <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="myModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="row">
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="overflow: auto; white-space: nowrap; padding: 10px;">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <table>
                                    <tr>
                                        <td><h4>Price : $154</h4></td>
                                        <td>bintang</td>
                                    </tr>
                                    <tr>
                                        <td>Category : smartphones</td>
                                        <td>Brand : Apple</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Stock : 900</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Description :</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">bla bla bla</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@vite('resources/js/fetch-dummyjson.js')
@endsection
