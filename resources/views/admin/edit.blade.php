@extends('layout.admin-layout')

@section('css')
<link href="{{asset("node_modules/froala-editor/css/froala_editor.pkgd.min.css")}}" rel="stylesheet" type="text/css" />    

@endsection

@section('content')
    <div class="body d-flex py-3">
        <div class="container col-xl-6">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Add New Product</h3>
                        <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase"
                            form="new-product">Save</button>
                    </div>
                </div>
            </div> <!-- Row end  -->

            <div class="row g-6 mb-3">
                <div class="col-12 col-12">
                    <div class="card mb-3">
                        <form action="{{ route('update', $product->slug) }}" method="POST" class="form-horizontal"
                            id="new-product" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Basic information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="mb-3">
                                        <label class="form-label" for="inputImage">Image:</label>
                                        <input type="file" name="photo" id="inputImage"
                                            class="form-control @error('photo') is-invalid @enderror">
                                        @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$product->name}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Page Title</label>
                                        <input type="text" class="form-control" name="page_title" value="{{$product->page_title}}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Product Identifier URL</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">https://a1-cares.com/</span>
                                            <input type="text" class="form-control" name="slug" value="{{$product->slug}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Product Description</label>
                                        <textarea required name="description" class="form-control"
                                            id="froala">{{$product->description}}</textarea>
                                            {{-- <div id="froala" name="description"></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div
                                class="card-header mt-4  py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Price information</h6>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <label class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                      <input type="number" class="form-control" name="price" value="{{$product->price}}" required>
                                      <span class="input-group-text">$</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputImage2">Image:</label>
                                        <input type="file" name="product_image[]" id="inputImage2"
                                            class="form-control ">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputImage3">Image:</label>
                                        <input type="file" name="product_image[]" id="inputImage3"
                                            class="form-control ">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputImage4">Image:</label>
                                        <input type="file" name="product_image[]" id="inputImage4"
                                            class="form-control ">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- Row end  -->
        </div>
    </div>
    {{-- <div class="container">
                <form action="{{ route('store') }}" method="POST" class="form-horizontal" >
    @csrf
    <fieldset>

        <!-- Form Name -->
        <legend>PRODUCTS</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_id">PRODUCT ID</label>
            <div class="col-md-4">
                <input id="product_id" name="product_id" placeholder="PRODUCT ID" class="form-control input-md"
                    required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
            <div class="col-md-4">
                <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md"
                    required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name_fr">PRODUCT DESCRIPTION FR</label>
            <div class="col-md-4">
                <input id="product_name_fr" name="product_name_fr" placeholder="PRODUCT DESCRIPTION FR"
                    class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
            <div class="col-md-4">
                <select id="product_categorie" name="product_categorie" class="form-control">
                </select>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="available_quantity">AVAILABLE QUANTITY</label>
            <div class="col-md-4">
                <input id="available_quantity" name="available_quantity" placeholder="AVAILABLE QUANTITY"
                    class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_weight">PRODUCT WEIGHT</label>
            <div class="col-md-4">
                <input id="product_weight" name="product_weight" placeholder="PRODUCT WEIGHT"
                    class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
            <div class="col-md-4">
                <textarea class="form-control" id="product_description" name="product_description"></textarea>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name_fr">PRODUCT DESCRIPTION FR</label>
            <div class="col-md-4">
                <textarea class="form-control" id="product_name_fr" name="product_name_fr"></textarea>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="percentage_discount">PERCENTAGE DISCOUNT</label>
            <div class="col-md-4">
                <input id="percentage_discount" name="percentage_discount" placeholder="PERCENTAGE DISCOUNT"
                    class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="stock_alert">STOCK ALERT</label>
            <div class="col-md-4">
                <input id="stock_alert" name="stock_alert" placeholder="STOCK ALERT" class="form-control input-md"
                    required="" type="text">

            </div>
        </div>

        <!-- Search input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="stock_critical">STOCK CRITICAL</label>
            <div class="col-md-4">
                <input id="stock_critical" name="stock_critical" placeholder="STOCK CRITICAL"
                    class="form-control input-md" required="" type="search">

            </div>
        </div>

        <!-- Search input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="tutorial">TUTORIAL</label>
            <div class="col-md-4">
                <input id="tutorial" name="tutorial" placeholder="TUTORIAL" class="form-control input-md" required=""
                    type="search">

            </div>
        </div>

        <!-- Search input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="tutorial_fr">TUTORIAL FR</label>
            <div class="col-md-4">
                <input id="tutorial_fr" name="tutorial_fr" placeholder="TUTORIAL FR" class="form-control input-md"
                    required="" type="search">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="online_date">ONLINE DATE</label>
            <div class="col-md-4">
                <input id="online_date" name="online_date" placeholder="ONLINE DATE" class="form-control input-md"
                    required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="author">AUTHOR</label>
            <div class="col-md-4">
                <input id="author" name="author" placeholder="AUTHOR" class="form-control input-md" required=""
                    type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="enable_display">ENABLE DISPLAY</label>
            <div class="col-md-4">
                <input id="enable_display" name="enable_display" placeholder="ENABLE DISPLAY"
                    class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="comment">COMMENT</label>
            <div class="col-md-4">
                <input id="comment" name="comment" placeholder="COMMENT" class="form-control input-md" required=""
                    type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="approuved_by">APPROUVED BY</label>
            <div class="col-md-4">
                <input id="approuved_by" name="approuved_by" placeholder="APPROUVED BY" class="form-control input-md"
                    required="" type="text">

                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">main_image</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="filebutton" class="input-file" type="file">
                    </div>
                </div>
                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">auxiliary_images</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="filebutton" class="input-file" type="file">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
                    <div class="col-md-4">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
                    </div>
                </div>

    </fieldset>
    </form> --}}
@endsection

@section('js')
<script type="text/javascript" src="{{asset("node_modules/froala-editor/js/froala_editor.pkgd.min.js")}}"></script>
<script>
    const editor = new FroalaEditor('#froala', {
        toolbarInline: false,
        imageUpload: false,
        imageManagerToggleTags: false,
        fileUpload: false,
        quickInsertEnabled: false,
        imageInsertButtons: [''],
    });
</script>
@endsection