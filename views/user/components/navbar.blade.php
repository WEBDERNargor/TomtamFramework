<nav class="navbar navbar-expand-lg site-header sticky-top bg-dark navbar-dark" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="{{SSL}}">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{SSL}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            หมวดหมู่
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{SSL}}/type/none">ไม่จัดหมวดหมู่</a></li>
            @foreach (get_type()['data'] as $key_type=>$row_type)
            <li><a class="dropdown-item" href="{{SSL}}/type/{{$row_type['tp_id']}}">{{$row_type['tp_name']}}</a></li>
           @endforeach
           
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      
        
         
      
      </ul>
    
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{SSL}}/search"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา</a>
        </li>
        @if ($user['status']=='success')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{$user['data']['m_name']}}
          </a>
          <ul class="dropdown-menu">
            @if($user['data']['m_auth']=='admin' or $user['data']['m_auth']=='employee')
            <li><a class="dropdown-item" href="{{SSL}}/admin">admin zone</a></li>
            @endif
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item logoutbtn" href="#">ออกจากระบบ</a></li>
          </ul>
        </li>
@else
<li class="nav-item">
  <a class="nav-link" href="{{SSL}}/register">ลงทะเบียน</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{SSL}}/login">เข้าสู่ระบบ</a>
</li>
@endif
       
      </ul>
     
    </div>
  </div>
</nav>
<script>


$(document).ready(function(){
  // const d = new Date();

  // if(d.getHours()>=6 && d.getHours()<18){
  //   $("#navbar").removeClass("navbar-dark").removeClass("bg-dark").addClass("bg-light");
  //   $(".theme").addClass("bg-light").removeClass("bg-dark");
  // }else{
  //   $("#navbar").addClass("navbar-dark").addClass("bg-dark").removeClass("bg-light");
  //   $(".theme").removeClass("bg-light").addClass("bg-dark").addClass("text-light");
  //   $("body").css("background","var(--bs-gray-700)");
  
  //     $(".mainlink").css("color","#E2E1E1");


  //   $(this).on('mouseenter','.mainlink',function(){
  //           $(this).css("color","var(--bs-white)");
  //          });

  //          $(this).on('mouseleave','.mainlink',function(){
  //           $(this).css("color","#E2E1E1");
  //           });


  // }
      $(".logoutbtn").click(function(){



Swal.fire({
title: 'ต้องการออกจากระบบหรือม่',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'ใช่',
cancelButtonText: 'ไม่'
}).then((result) => {
if (result.isConfirmed) {
 window.location="{{SSL}}/logout";
}
})


});
});

</script>