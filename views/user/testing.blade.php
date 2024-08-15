@extends('user.layouts.app')
 


@section('php_code')



@endsection


@section('title',"โปรไฟล์")
 
@section('header')

@endsection

 
@section('content')
<div class="container mx-auto ">
    <div class="grid grid-cols-4 gap-4">
        <div class="">
            <div x-cloak class="w-full" x-data="{showlist:false}" @click.away="showlist=false">
               
                    <button @click="showlist=!showlist" type="button" class=" py-1 bg-zinc-500 text-white w-full rounded-xl">Alternative</button>
                    <ul class="w-full" x-show="showlist" 
                    x-transition:enter="transition ease-out duration-700"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-trinstion:leave="transition ease-in duration-700"
                    x-trinstion:leave-start="opacity-100 tranform scale-100"
                    x-trinstion:leave-end="opacity-0 transform scale-90"
                    >
                        <li class="flex w-full justify-center">
                            <a class="" href="">dsfrsdf</a>
                        </li>
                        <li class="flex w-full justify-center">
                            <a class="" href="">dsfrsdf</a>
                        </li>
                    </ul>
                
            </div>
        </div>
        <div class="col-span-2 border-2">
    sdfsdf
        </div>
        <div>
    sdfsdf
        </div>
    </div>
    
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection