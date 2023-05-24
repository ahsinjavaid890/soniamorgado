@extends('frontend.layouts.main')
@section('tittle')
<title>News and Updates</title>
@endsection
@section('content')
<!-- start wpo-page-title -->
<section class="wpo-page-title" style="background: url('{{ url('') }}/public/front/images/page-title.jpg') no-repeat center top/cover">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>News and Updates</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index.html">Home</a></li>
                        <li>News and Updates</li>
                    </ol>
                </div>
            </div>  
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>

@endsection