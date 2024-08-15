@extends('user.layouts.app')
 


@section('php_code')

<?php

?>

@endsection


@section('title', WEB)
 
@section('header')

@endsection

 
@section('content')
<div class="container mx-auto">
  
  <textarea name="" id="detail" cols="30" rows="10"></textarea>
</div>
@endsection

@section('scripts')

<script>
CKEDITOR.replace('detail');
    
</script>
@endsection