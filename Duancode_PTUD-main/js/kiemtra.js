
//kiểm tra họ tên
function kiemTraHoten(){
    let hoten = document.getElementById("txtHoten").value;
    let regexHoten = /^([A-Z]{1,})$/gm;
    if(hoten.trim()===''){
        document.getElementById("tbHoten").innerHTML = "Họ tên thì bắc buộc nhập";
        return false;
    }
    if(!regexHoten.test(hoten)){
        document.getElementById("tbHoten").innerHTML = "Họ tên phải nhập bằng chữ cái IN HOA không dấu";
        return false;
    }

    document.getElementById("tbHoten").innerHTML = "*";
    return true;
}
// kiểm tra năm sinh
function kiemTraNamsinh(){
    let namsinh = document.getElementById("txtNamsinh").value;
    let regexNS = /^(\d{4})$/gm;
    if(namsinh.trim()===''){
        document.getElementById("tbNamsinh").innerHTML = "Năm sinh thì bắc buộc nhập";
        return false;
    }
    if(!regexNS.test(namsinh)){
        document.getElementById("tbNamsinh").innerHTML = "Năm sinh phải nhập số (4 số)";
        return false;
    }

    document.getElementById("tbNamsinh").innerHTML = "*";
    return true;
}
//kiểm tra cccd
function kiemTraCccd(){
    let cccd = document.getElementById("txtCccd").value;
    let regexCccd =  /^(2214[0-9]{5,})*$/;	
    if(cccd.trim()===''){
        document.getElementById("tbCccd").innerHTML = "CCCD/CMND thì bắc buộc nhập";
        return false;
    }
    if(!regexCccd.test(cccd)){
        document.getElementById("tbCccd").innerHTML = "CCCD phải nhập số";
        return false;
    }
    document.getElementById("tbCccd").innerHTML = "*";
    return true;
}
//kiểm tra quốc gia
function kiemTraQuocgia(){
    let quocgia = document.getElementById("txtQuocgia").value;
    if(quocgia.trim()===''){
        document.getElementById("tbQuocgia").innerHTML = "Quốc gia thì bắc buộc nhập";
        return false;
    }

    document.getElementById("tbQuocgia").innerHTML = "*";
    return true;
}
//kiểm tra tỉnh/thành
function kiemTraTinhthanh(){
    let tinhthanh = document.getElementById("txtTinhthanh").value;
    if(tinhthanh.trim()===''){
        document.getElementById("tbTinhthanh").innerHTML = "Tỉnh/thành thì bắc buộc nhập";
        return false;
    }

    document.getElementById("tbTinhthanh").innerHTML = "*";
    return true;
}
//kiểm tra quận huyện
function kiemTraQuanhuyen(){
    let quanhuyen = document.getElementById("txtQuanhuyen").value;
    if(quanhuyen.trim()===''){
        document.getElementById("tbQuanhuyen").innerHTML = "Quận/huyện thì bắc buộc nhập";
        return false;
    }

    document.getElementById("tbQuanhuyen").innerHTML = "*";
    return true;
}
//kiểm tra phường xã
function kiemTraPhuongxa(){
    let phuongxa = document.getElementById("txtPhuongxa").value;
    if(phuongxa.trim()===''){
        document.getElementById("tbPhuongxa").innerHTML = "Phường/xã thì bắc buộc nhập";
        return false;
    }

    document.getElementById("tbPhuongxa").innerHTML = "*";
    return true;
}
//kiểm tra địa chỉ
function kiemTraDiachi(){
    let diachi = document.getElementById("txtDiachi").value;
    if(diachi.trim()===''){
        document.getElementById("tbDiachi").innerHTML = "Địa chỉ thì bắc buộc nhập";
        return false;
    }

    document.getElementById("tbDiachi").innerHTML = "*";
    return true;
}
// kiểm tra sdt
function kiemTraDienthoai(){
    let dienthoai = document.getElementById("txtSdt").value;
    let regexDienthoai = /^\d{9,10}$/;

    if(dienthoai.trim()===''){
        document.getElementById("tbSdt").innerHTML = "Điện thoại thì bắc buộc nhập";
        return false;
    }

    if(!regexDienthoai.test(dienthoai)){
        document.getElementById("tbSdt").innerHTML = "Điện thoại có 9 hoặc 10 số";
        return false;
    }

    document.getElementById("tbSdt").innerHTML = "*";
    return true;
}
function kiemTraEmail(){
    let email = document.getElementById("txtEmail").value;
    let regexEmail = /^\w+@\w+\.com$/;

    if(email.trim()===''){
        document.getElementById("tbEmail").innerHTML = "Email thì bắc buộc nhập";
        return false;
    }

    if(!regexEmail.test(email)){
        document.getElementById("tbEmail").innerHTML = "Email có dạng ten@tencongty.com";
        return false;
    }

    document.getElementById("tbEmail").innerHTML = "*";
    return true;
}


let i=0;
function btnDangky(){
    if(!kiemTraHoten() || !kiemTraNamsinh() || !kiemTraCccd()|| !kiemTraQuocgia()|| !kiemTraQuocgia() || !kiemTraTinhthanh() ||  !kiemTraQuanhuyen() || !kiemTraPhuongxa() || !kiemTraDiachi() || !kiemTraDienthoai() || !kiemTraEmail() ){
        return false;
    }
    let hoten = document.getElementById("txtHoten").value;
    let namsinh = document.getElementById("txtNamsinh").value;
    let cccd = document.getElementById("txtCccd").value;
    let gioitinh = "Nữ";
            if(document.getElementById("rdoNam").checked)
                gioitinh = "Nam";
    let quocgia = document.getElementById("txtQuocgia").value;
    let tinhthanh = document.getElementById("txtTinhthanh").value;
    let quanhuyen = document.getElementById("txtQuanhuyen").value;
    let phuongxa = document.getElementById("txtPhuongxa").value;
    let diachi = document.getElementById("txtDiachi").value;
    let dienthoai = document.getElementById("txtSdt").value;
    let email = document.getElementById("txtEmail").value;
    return true;
}