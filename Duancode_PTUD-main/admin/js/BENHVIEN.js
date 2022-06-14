// Đối tượng 'Validator'
function Validator(options){
    var selectorRule = {};
    // HÀM THỰC HIỆN VALIDATE
    function Validate(inputElement, rule){
        var errorMessage = rule.test(inputElement.value);
        var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
                    if(errorMessage){
                      errorElement.innerText = errorMessage;
                    }else {
                        errorElement.innerText = '';
                    }
    }

    // LẤY ELEMENT CỦA FORM CẦN VALIDATE
    var formElement = document.querySelector(options.form);

    if(formElement){

        // khi submit form
        formElement.onsubmit = function(e){
            e.prevenDfault();
             

            options.rules.forEach(function(rule){
                var inputElement = formElement.querySelector(rule.selector);
                Validate(inputElement, rule);

            })
        }
       
        options.rules.forEach(function(rule){

            // lưu lại các rules mõi input
            if(Array.isArray(selectorRule[rule.selector])){
                selectorRule[rule.selector].push(rule.test);
            }
            else{
                selectorRule[rule.selector] = [rule.test];
            }
            var inputElement = formElement.querySelector(rule.selector);
            if(inputElement){
                // xử lý trường hợp blur khỏi input
                inputElement.onblur = function(){
                    // value: inputElement.value
                    // test func: rules.test
                    Validate(inputElement, rule);
                }
                // xử lý mỗi khi người dùng nhập
                inputElement.oninput = function(){
                    var errorElement = inputElement.parentElement.querySelector('.form-message');
                    errorElement.innerText = '';
                }
            }
        });
    }
}
// Định nghĩa về rules
// nguyên tác của các rulse:
// 1. khi có lỗi => trả ra lỗi
// 2. không có lỗi => không trả ra
Validator.isTenBenhVien = function(selector){
    
    return {selector: selector,
        test: function(value){
            var regex = /^[A-Z0-9 ]{5,50}$/;
            return regex.test(value) ? undefined: 'ĐỊNH DẠNG: IN HOA, KHÔNG DẤU, SỐ, KHOẢNG CÁCH, DÀI 5-50 KÍ TỰ';
        }
    };
}
Validator.isSLBacSi = function(selector){
    
    return {selector: selector,
        test: function(value){
            var regex = /^[0-9]{1,5}$/;
            return regex.test(value) ? undefined :'ĐỊNH DẠNG SỐ LƯỢNG LUÔN LỚN HƠN 0 VÀ NHỎ HƠN 100.000';
        }
    };
}
Validator.isSLYta = function(selector){
    return {selector: selector,
        test: function(value){
            var regex = /^[0-9]{1,5}$/;
            return regex.test(value) ? undefined :'ĐỊNH DẠNG SỐ LƯỢNG LUÔN LỚN HƠN 0 VÀ NHỎ HƠN 100.000';
        }
    };
}
Validator.isSoGiuongBenh = function(selector){
    return {selector: selector,
        test: function(value){
            var regex = /^[0-9]{1,5}$/;
            return regex.test(value) ? undefined :'ĐỊNH DẠNG SỐ LƯỢNG LUÔN LỚN HƠN 0 VÀ NHỎ HƠN 100.000';
        }
    };
}
Validator.isSoGiuongBenhTrong = function(selector){
    return {selector: selector,
        test: function(value){
            var regex = /^[0-9]{1,5}$/;
            return regex.test(value) ? undefined :'ĐỊNH DẠNG SỐ LƯỢNG LUÔN LỚN HƠN 0 VÀ NHỎ HƠN 100.000';
        }
    };
}
Validator.isSoBenhNhanDangDieuTri = function(selector){
    return {selector: selector,
        test: function(value){
            var regex = /^[0-9]{1,5}$/;
            return regex.test(value) ? undefined :'ĐỊNH DẠNG SỐ LƯỢNG LUÔN LỚN HƠN 0 VÀ NHỎ HƠN 100.000';
        }
    };
}
Validator.isDiaChi = function(selector){
    return {selector: selector,
        test: function(value){
            return value ? undefined : 'KHÔNG ĐƯỢC BỎ TRỐNG';
        }
    };
}