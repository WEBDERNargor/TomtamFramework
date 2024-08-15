function logout(){
    Swal.fire({
        title: "แจ้งเตือนจากระบบ",
        text: "คุณต้องการออกจากระบบหรือไม่",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "ออกจากระบบ",
        cnacelButtonText: "อยู่ต่อ"
      }).then((result) => {
        if (result.isConfirmed) {
            window.location=`${SSL}/logout`;
        }
      });
}