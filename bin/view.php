<?php
$myfile = fopen("./views/".$argv[1].".blade.php", "w") or die("Unable to open file!");

$txt = "
@extends('user.layouts.app')
 
@section('title', 'title')
 
@section('header')

@endsection

 
@section('content')

@endsection

@section('scripts')
<script>
</script>
@endsection

";
fwrite($myfile, $txt);
echo "create  ".$argv[1].".blade.php successfully";
// var_dump($argv);
