@extends('user.layouts.empty')
 
@section('php_code')

@php
$login_type="login";
if(isset($_GET['action']) && $_GET['action']=='signup'){
$login_type="signup";
}
@endphp

@endsection

@section('title',"เข้าสู่ระบบ - ".WEB)
 
@section('header')



@endsection

 
@section('content')

<div class="w-screen bg-gradient-to-br from-purple-400 via-pink-500 to-red-500 min-h-screen flex items-center justify-center">




    <div class="container mx-auto px-4" x-data="loginform()" x-cloak>
        <div class="max-w-md mx-auto bg-white   rounded-lg overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-300">
            <div class="text-center py-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                <h1 class="text-3xl font-bold">Welcome</h1>
                <p class="mt-2">{{WEB}}</p>
            </div>
            <div class="p-8">
                <div class="flex justify-center mb-6">
                   
                    <button  @click="changetype('login')" :class="{ 'bg-blue-500 text-white': tab === 'login', 'bg-gray-200 text-gray-700': tab !== 'login' }" class="px-4 py-2 rounded-l-md focus:outline-none transition-colors duration-300">Login</button>
                    <button  @click="changetype('signup')" :class="{ 'bg-blue-500 text-white': tab === 'signup', 'bg-gray-200 text-gray-700': tab !== 'signup' }"  class="px-4 py-2 rounded-r-md focus:outline-none transition-colors duration-300">Sign Up</button>
                </div>
                
                {{-- login form --}}
                <form  @submit.prevent="loginform()" x-show="tab === 'login'" class="space-y-4">
                    <div class="relative">
                        <input x-model="loginEmail" type="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10" placeholder="Email">
                        <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="relative">
                        <input x-model="loginPassword" type="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10" placeholder="Password">
                        <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-md hover:opacity-90 transition-opacity duration-300 transform hover:scale-105">Login</button>
                </form>


                {{-- register form --}}
                <form @submit.prevent="registerform()" x-show="tab === 'signup'" class="space-y-4">
                    <div class="relative">
                        <input x-model="registerFname"  type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10" placeholder="First Name">
                        <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="relative">
                        <input x-model="registerLname"  type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10" placeholder="Last Name">
                        <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="relative">
                        <input x-model="registerEmail" type="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10" placeholder="Email">
                        <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="relative">
                        <input type="password" x-model="registerPassword" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10" placeholder="Password">
                        <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="relative">
                        <input type="password" x-model="registerRepass" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10" placeholder="Re-Password">
                        <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-md hover:opacity-90 transition-opacity duration-300 transform hover:scale-105">Sign Up</button>
                </form>

                  
                <div class="mt-6">
                    <p class="text-center text-gray-600 mb-4">Or continue with</p>
                    <div class="flex justify-center space-x-4">
                       
                        <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors duration-300">
                            <i class="fab fa-google mr-2"></i> Google
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>




@endsection

@section('scripts')
<script >


function loginform(){
    return{
        tab:"{{$login_type}}",
        registerEmail:'',
        registerPassword:'',
        registerRepass:'',
        registerFname:'',
        registerLname:'',
        loginEmail:'',
        loginPassword:'',
        submitted:false,
        changetype(tabdata){
            this.tab=tabdata;
            if(this.tab=='signup'){
            window.history.pushState('page1', 'Login', `${SSL}/login?action=signup`);
            }else{
            window.history.pushState('page1', 'Register', `${SSL}/login?action=login`);
            }
        },
         registerform(){
                const myHeaders = new Headers();
                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
                const urlencoded = new URLSearchParams();
                urlencoded.append("email", this.registerEmail);
                urlencoded.append("fname", this.registerFname);
                urlencoded.append("lname", this.registerLname);
                urlencoded.append("re-pass", this.registerRepass);
                urlencoded.append("password", this.registerPassword);
                const requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: urlencoded,
                };
               
        fetch(`${SSL}/api/register`, requestOptions)
        .then(response => response.json())
        .then(result => {
            if(result.status=='success'){
            Swal.fire({
            title: "ลงทะเบียนสำเร็จ",
            icon:"success",
            customClass:{
                confirmButton:"buttonswweetalertcolor"
            }
            }).then((e)=>{
                window.location=`${SSL}/login`;
            })
            }else{
            Swal.fire({
            title: result.msg,
            icon:"error",
            customClass:{
                confirmButton:"buttonswweetalertcolor"
            }
            });
            }
        }).catch(error => {
            Swal.fire({
            title: error,
            icon:"error",
            customClass:{
                confirmButton:"buttonswweetalertcolor"
            }
            });
        });
      
        },
        loginform(){
            const myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
            const urlencoded = new URLSearchParams();
            urlencoded.append("email", this.loginEmail);
            urlencoded.append("password", this.loginPassword);
            const requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
            };
           
    fetch(`${SSL}/api/login`, requestOptions)
    .then(response => response.json())
    .then(result => {
        // console.log(result);
        if(result.status=='success'){
        Swal.fire({
        title: "เข้าสู่ระบบสำเร็จ",
        icon:"success",
        customClass:{
            confirmButton:"buttonswweetalertcolor"
        },
        timer: 5000
        }).then((e)=>{
            setSecureCookie("login_cookie",result.token,7)
            window.location=`${SSL}`;
        })
        }else{
        Swal.fire({
        title: result.msg,
        icon:"error",
        customClass:{
            confirmButton:"buttonswweetalertcolor"
        }
        });
        }
    }).catch(error => {
        Swal.fire({
        title: error,
        icon:"error",
        customClass:{
            confirmButton:"buttonswweetalertcolor"
        }
        });
    });
        }
       
    }
}




</script>
@endsection