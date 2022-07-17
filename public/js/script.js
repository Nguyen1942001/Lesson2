function goToPage(page) {
    var str_param = getUpdatedParam("page", page);
    window.location.href = "index.php?" + str_param;
}

function getUpdatedParam(k, v) {
    var params={};
    window.location.search
      .replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str,key,value) {
        params[key] = value;
      }
    );
      
    params[k] = v;
    if (v == "") {
        delete params[k];
    }

    var x = [];//là array
    for (p in params) {
        x.push(p + "=" + params[p]);
    }
    return str_param = x.join("&");
}

// Phần register
$(".form-register").validate({
  rules: {
      fullname: {
          required: true,
          maxlength: 50,
          regex:
          /^[a-zA￾ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i,
      },
  
      email: {
          required: true,
          maxlength: 50,
          email: true,
          remote: "/index.php?c=register&a=notExistingEmail"
      },
  
      password: {
          required: true,
          regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/,
      },
  
      confirm_password: {
          required: true,
          equalTo: "[name=password]",
      }
  },

  
  messages: {
      fullname: {
          required: "Vui lòng nhập họ tên",
          maxlength: "Vui lòng nhập không quá 5 ký tự",
          regex: "Không được nhập số và ký tự đặc biệt",
      },
  
      email: {
          required: "Vui lòng nhập email",
          maxlength: "Vui lòng nhập không quá 50 ký tự",
          email: "Vui lòng nhập đúng định dạng email",
          remote: "Email này đã được đăng ký"
      },
  
      password: {
          required: "Vui lòng nhập mật khẩu",
          regex: "Mật khẩu phải bao gồm số, ký tự đặc biệt, chữ hoa, chữ thường, hơn 8 ký tự",
      },
  
      confirm_password: {
          required: "Vui lòng xác nhận mật khẩu",
          equalTo: "Vui lòng xác nhận đúng mật khẩu",
      }
  },
});

// Phần edit
$(".form-edit").validate({
    rules: {
        fullname: {
            required: true,
            maxlength: 50,
            regex:
            /^[a-zA￾ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i,
        },
    
        email: {
            required: true,
            maxlength: 50,
            email: true
        },
    
        new_password: {
            regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/,
        },
    
        confirm_new_password: {
            equalTo: "[name=new_password]",
        }
    },
  
    
    messages: {
        fullname: {
            required: "Vui lòng nhập họ tên",
            maxlength: "Vui lòng nhập không quá 5 ký tự",
            regex: "Không được nhập số và ký tự đặc biệt",
        },
    
        email: {
            required: "Vui lòng nhập email",
            maxlength: "Vui lòng nhập không quá 50 ký tự",
            email: "Vui lòng nhập đúng định dạng email",
        },
    
        new_password: {
            regex: "Mật khẩu phải bao gồm số, ký tự đặc biệt, chữ hoa, chữ thường, hơn 8 ký tự",
        },
    
        confirm_new_password: {
            equalTo: "Vui lòng xác nhận đúng mật khẩu",
        }
    },
  });


  // Phần login
$(".form-login").validate({
    rules: {
        email: {
            required: true,
            email: true
        },
    
        password: {
            required: true,
            regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
        }
    },
  
    
    messages: {
        email: {
            required: "Vui lòng nhập email",
            email: "Vui lòng nhập đúng định dạng email",
        },
    
        password: {
            required: "Vui lòng nhập mật khẩu",
            regex: "Mật khẩu phải bao gồm số, ký tự đặc biệt, chữ hoa, chữ thường, hơn 8 ký tự",
        }
    },
  });


$.validator.addMethod(
  "regex",
  function (value, element, regexp) {
  if (regexp.constructor != RegExp) regexp = new RegExp(regexp);
  else if (regexp.global) regexp.lastIndex = 0;
  return this.optional(element) || regexp.test(value);
  },
  "Please check your input. It is not matched regex"
);
