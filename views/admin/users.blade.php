@extends('admin.layouts.app')
 


@section('php_code')

@php

@endphp

@endsection


@section('title', "Users")
 
@section('header')

@endsection

 
@section('content')



<div class="p-4 sm:ml-64 " x-data="pagestart()" x-init="init()">
 


    <div class="w-full ">

        <div class="w-full text-center">
            <h2 class="text-2xl"><b>บัญชีผูใช้</b></h2>
        </div>
        
        <div class="w-full">
        

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   #
                </th>
                <th scope="col" class="px-6 py-3">
                   Email
                </th>
                <th scope="col" class="px-6 py-3">
                    First name
                </th>
                <th scope="col" class="px-6 py-3">
                    Last name
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($fetch as $key=>$row)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$key+1}}
                </th>
                <td class="px-6 py-4">
                  {{$row['m_email']}}
                </td>
                <td class="px-6 py-4">
                    {{$row['m_fname']}}
                </td>
                <td class="px-6 py-4">
                    {{$row['m_lname']}}
                </td>
                <td class="px-6 py-4 text-right">
                    <a @click.prevent="openedit({{$row['m_id']}})" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
         @endforeach
           
        </tbody>
    </table>
</div>

            
            </div>
            
        </div>
        


        <div 
        id="modalEl"
        tabindex="-1"
        aria-hidden="true"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0"
       >
        <div class="relative max-h-full w-full max-w-2xl">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-start justify-between rounded-t border-b p-5 dark:border-gray-600"
                >
                    <h3
                        class="text-xl font-semibold text-gray-900 dark:text-white lg:text-2xl"
                    >
                       แก้ไขบัญชีผู้ใช้
                    </h3>
                    <button @click="modal.hide()"
                        type="button"
                        class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        <svg
                            class="h-3 w-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                            />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form @submit.prevent="submitedit()" class="max-w-md mx-auto">
                <!-- Modal body -->
                <div class="space-y-6 p-6">
                  
       
    
           <div class="relative z-0 w-full mb-5 group">
               <input disabled x-model="modalform.email" type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
               <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
           </div>
          
           <div class="grid md:grid-cols-2 md:gap-6">
             <div class="relative z-0 w-full mb-5 group">
                 <input x-model="modalform.fname" type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                 <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
             </div>
             <div class="relative z-0 w-full mb-5 group">
                 <input x-model="modalform.lname" type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                 <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
             </div>
           </div>
       

                 <div class="relative z-0 w-full mb-5 group">
                    <label for="underline_select" class="sr-only">Underline select</label>
                    <select x-model="modalform.auth" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="">เลือกสิทธิ์</option>
                        <option value="superadmin">ผู้พัฒนา</option>
                        <option value="admin">พนักงาน</option>
                        <option value="user">ผู้ใช้</option>
                      
                    </select>
           </div>


           <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input x-model="password.pass" type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input x-model="password.repass" type="password" name="floating_repass" id="floating_repass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_repass" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password</label>
            </div>
          </div>
           
       
         
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center space-x-2 rtl:space-x-reverse rounded-b border-t border-gray-200 p-6 dark:border-gray-600"
                >
                    <button
                        type="submit"
                        class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        แก้ไข
                    </button>
                    <button @click="modal.hide()"
                        type="button"
                        class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        Decline
                    </button>
                </div>
            </form>
            </div>
        </div>
       </div>
       


 </div>








 
@endsection

@section('scripts')
<script>








function pagestart(){
    return{
        modalform:{
            id:"",
            email:"",
            fname:"",
            lname:"",
            auth:"",
            auth_text:""
        },
        password:{
            pass:"",
            repass:""
        },
        modal:null,
        init(){


const $targetEl = document.getElementById('modalEl');
const options = {
    backdrop: 'dynamic',
    backdropClasses:
        'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
    closable: true,
    onHide: () => {
        this.modalform={
            id:"",
            email:"",
            fname:"",
            lname:"",
            auth:"",
            auth_text:""
            }

            this.password={
            pass:"",
            repass:""
        }
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled');
    },
};

// instance options object
const instanceOptions = {
  id: 'modalEl',
  override: true
};



this.modal = new Modal($targetEl, options, instanceOptions);


        },
        

       openedit(id){


            const myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
            const urlencoded = new URLSearchParams();
            urlencoded.append("id", id);
         
            const requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
            };
            this.modal.show();
    fetch(`${SSL}/admin/api/user_single`, requestOptions)
    .then(response => response.json())
    .then(result => {
        if(result.status=='success'){
            this.modalform.id=result.data.m_id;
            this.modalform.email=result.data.m_email;
            this.modalform.fname=result.data.m_fname;
            this.modalform.lname=result.data.m_lname;
            this.modalform.auth=result.data.m_auth;
           if(result.data.m_auth=='superadmin'){
            this.modalform.auth_text='ผู้พัฒนา';
           }else if(result.data.m_auth=='admin'){
            this.modalform.auth_text='พนักงาน';
           }else{
            this.modalform.auth_text='ลูกค้า';
           }
           
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
submitedit(){
    const myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
            const urlencoded = new URLSearchParams();
            urlencoded.append("id", this.modalform.id);
            urlencoded.append("fname", this.modalform.fname);
            urlencoded.append("lname", this.modalform.lname);
            urlencoded.append("password", this.password.pass);
            urlencoded.append("repass", this.password.repass);
            const requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
            };

        fetch(`${SSL}/admin/api/user_edit`, requestOptions)
    .then(response => response.json())
    .then(result => {
        if(result.status=='success'){
            Swal.fire({
        title: "แก้ไขข้อมูลสำเร็จ",
        icon:"success",
        customClass:{
            confirmButton:"buttonswweetalertcolor"
        },
        timer: 5000
        }).then((e)=>{
            
            window.location.reload();
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
    };
}


</script>
@endsection