$(document).ready(function () {
  var containermenu = $(this);
  var itemmenu = containermenu.find(".xtlab-ctmenu-item");
  itemmenu.click(function () {
    var submenuitem = containermenu.find(".xtlab-ctmenu-sub");
    submenuitem.slideToggle(500);
  });
  $(document).click(function (e) {
    if (
      !containermenu.is(e.target) &&
      containermenu.has(e.target).length === 0
    ) {
      var isopened = containermenu.find(".xtlab-ctmenu-sub").css("display");
      if (isopened == "block") {
        containermenu.find(".xtlab-ctmenu-sub").slideToggle(500);
      }
    }
  });
  $(".products__main").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    draggable: false,
    dots: false,
    // autoplay: true,
    arrows: true,
    speed: 1000,
    prevArrow: '<i class="fa fa-angle-left btn-prev"></i>',
    nextArrow: '<i class="fa fa-angle-right btn-next"></i>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });
  $(".slider-main").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    draggable: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    mobileFirst: true,
    prevArrow: '<i class="fa fa-angle-left slider-prev"></i>',
    nextArrow: '<i class="fa fa-angle-right slider-next"></i>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          arrows: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        },
      },
    ],
  });
  const offerItems = document.querySelectorAll(".col-offer");
  offerItems.forEach((item) =>
    item.addEventListener("mouseover", () => {
      item.lastElementChild.style = "display:block";
    })
  );
  offerItems.forEach((item) =>
    item.addEventListener("mouseout", () => {
      item.lastElementChild.style = "display:none";
    })
  );
  $.each($(".button"), function (i, item) {
    item.addEventListener("click", () => {
      var dataPost;
      if (i === 0) {
        dataPost = "new_products";
      } else if (i === 1) {
        dataPost = "selling_products";
      } else {
        dataPost = "popular_products";
      }
      $.ajax({
        url: "./templates/featured_products.php",
        method: "POST",
        data: {
          dataPost: dataPost,
        },
        success: function (data) {
          $(".product__wrapper").html(data);
          $(".products__main").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
            draggable: false,
            dots: false,
            // autoplay: true,
            arrows: true,
            speed: 1000,
            prevArrow: '<i class="fa fa-angle-left btn-prev"></i>',
            nextArrow: '<i class="fa fa-angle-right btn-next"></i>',
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: false,
                },
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                },
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                },
              },
            ],
          });
        },
      });
    });
  });
  var flag = -1;

  $(".dropdown").click(function () {
    if (flag === -1) {
      $(".drodown-mega-menu").show(1000);
      flag = 1;
    } else {
      $(".drodown-mega-menu").hide(1000);
      flag = -1;
    }
  });

  $.each($(".add_to_cart"), function (i, item) {
    item.addEventListener("click", () => {
      $.ajax({
        type: "POST",
        url: "./templates/add_cart.php",
        data: item.dataset,
        success: function (response) {
          // console.log(item.dataset);
          Toast.fire({
            icon: 'success',
            title: 'Sản phẩm đã được thêm vào giỏ hàng',
          })
          $(".qty_cart").text(response);
        },
      });
    });
  });

  $("#sort").change(function () {
    data = {
      idLoai: getUrlParameter("idLoai"),
      sort: $("#sort").val(),
      page: getUrlParameter("page"),
      price_from: $("#price_from").val(),
      price_to: $("#price_to").val(),
      key: $("#search").val(),
    };
    $.ajax({
      type: "GET",
      url: "./templates/product_items.php",
      data: data,
      success: function (response) {
        $(".product-list").html(response);
      },
    });
  });
  $(".filter-box").submit(function (e) {
    e.preventDefault();
    data = {
      idLoai: getUrlParameter("idLoai"),
      sort: $("#sort").val(),
      page: getUrlParameter("page"),
      price_from: $("#price_from").val(),
      price_to: $("#price_to").val(),
      key: $("#search").val(),
    };
    $.ajax({
      type: "GET",
      url: "./templates/product_items.php",
      data: data,
      success: function (response) {
        $(".product-list").html(response);
      },
    });
  });
  $(".similar_product-wrapper").slick({
    slidesToShow: 4,
    slidesToScroll: 3,
    infinite: true,
    arrows: false,
    draggable: false,
    dots: false,
    // autoplay: true,
    arrows: true,
    speed: 1000,
    prevArrow: '<i class="fa fa-angle-left btn-prev"></i>',
    nextArrow: '<i class="fa fa-angle-right btn-next"></i>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });
  const quantity_sub = $(".quantity_sub");
  const quantity_add = $(".quantity_plus");
  const quantity_input = $(".quantity_input");
  // const add_cart = $('.add_cart');
  quantity_sub.click(function () {
    if (quantity_input.val() > 1) {
      quantity_input.val(parseInt(quantity_input.val()) - 1);
    }
  });
  quantity_add.click(function () {
    quantity_input.val(parseInt(quantity_input.val()) + 1);
  });
  $(".add_cart").click(function () {
    if (getUrlParameter("id") !== null) {
      

      $.ajax({
        type: "POST",
        url: "./templates/add_cart.php",
        data: {
          masanpham: getUrlParameter("id"),
          quantity: quantity_input.val(),
        },
        success: function (response) {
          // console.log(item.dataset);
          Toast.fire({
            icon: 'success',
            title: 'Sản phẩm đã được thêm vào giỏ hàng',
          })
          $(".qty_cart").text(response);
        },
      });
    } else {
      alert("số lượng phải lớn hơn 0");
    }
  });
  $.each($(".cart_quantity_plus"), function (indexInArray, valueOfElement) {
    valueOfElement.addEventListener("click", () => {
      var input = valueOfElement.parentElement.childNodes[3];
      input.value =
        parseInt(valueOfElement.parentElement.childNodes[3].value) + 1;
    });
  });
  $.each($(".cart_quantity_sub"), function (indexInArray, valueOfElement) {
    valueOfElement.addEventListener("click", () => {
      var input = valueOfElement.parentElement.childNodes[3];
      if (input.value > 0) {
        input.value =
          parseInt(valueOfElement.parentElement.childNodes[3].value) - 1;
      }
      if (input.value < 1) {
        //===========xóa
        Swal.fire({
          title: 'Xóa?',
          text: "Bạn có muốn xóa sản phẩm này? :((",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Xóa luôn!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: "POST",
              url: "./templates/delete_cart.php",
              data: {
                idsp: valueOfElement.dataset.idsp,
                act: "delete",
              },
              success: function (response) {
                Swal.fire(
                  'Xóa sản phẩm!',
                  'Sản phẩm đã được xóa khỏi giỏ hàng.',
                  'success'
                )
                setTimeout(() => {
                  location.reload();
                }, 2000);
              },
            });
          }else if(
            result.dismiss === Swal.DismissReason.cancel
          ) {
            input.value = 1;
          }
        })
        
      }
    });
  });
  $.each($(".btn-remove"), function (indexInArray, valueOfElement) {
    valueOfElement.addEventListener("click", () => {
      Swal.fire({
        title: 'Xóa?',
        text: "Bạn có muốn xóa sản phẩm này? :((",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa luôn!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "./templates/delete_cart.php",
            data: {
              idsp: valueOfElement.dataset.idsp,
              act: "delete",
            },
            success: function (response) {
              Swal.fire(
                'Xóa sản phẩm!',
                'Sản phẩm đã được xóa khỏi giỏ hàng.',
                'success'
              )
              setTimeout(() => {
                location.reload();
              }, 2000);
            },
          });
        }
      })
      
    });
  });
  $.each($(".btn-update"), function (indexInArray, valueOfElement) {
    valueOfElement.addEventListener("click", () => {
      $qty = valueOfElement.parentElement.parentElement.querySelector(
        ".cartquantity_input"
      );
      $.ajax({
        type: "POST",
        url: "./templates/delete_cart.php",
        data: {
          idsp: valueOfElement.dataset.idsp,
          act: "update",
          quantity: $qty.value,
        },
        success: function (response) {
          // $(".qty_cart").text(response);
          location.reload();
        },
      });
    });
  });
  $(".alert-close").click(function () {
    $(".alert").hide();
  });
  $(".btn-alert").click(function () {
    $(".alert").hide();
    location.reload();
  });
  $(".check_out").click(function () {
    $.ajax({
      type: "POST",
      url: "./templates/message.php",
      data: {
        test: "login",
      },
      success: function (response) {
        console.log(response);
        if (response.trim() == "Đã đăng nhập") {
          window.location.href = "?page=checkout";
        } else {
          $(".alert-body").html(response);
          $(".alert").show();
          $(".alert").css("display", "flex");
        }
      },
    });
  });
  $(".btn_continue").click(function () {
    window.location.href = "?page=home";
  });
  const cod = $("#cod");
  const bacs = $("#bacs");
  cod.click(function () {
    console.log("cod");
    $(".payment_method_cod_box").show();
    $(".payment_method_bacs_box").hide();
  });
  bacs.click(function () {
    console.log("bacs");
    $(".payment_method_cod_box").hide();
    $(".payment_method_bacs_box").show();
  });

  $(".btn_order").click(function () {
    
    if(validate_payment()){
      const name = $("#name").val();
      const address = $("#address").val();
      const email = $("#email").val();
      const note = $("#note").val();
      const city = $("#city").val();
      const phone = $("#phone").val();
      $.ajax({
          type: "POST",
          url: "./templates/order.php",
          data: {
            name: name,
            address: address,
            email: email,
            note: note,
            city: city,
            phone: phone,
            act: "add_order",
          },
          success: function (response) {
            if (response.trim() == "Đặt hàng thành công") {
                Swal.fire({
                  title: 'Đặt hàng thành công.',
                  width: 600,
                  padding: '2em',
                  color: '#716add',
                  backdrop: `
                    rgba(0,0,123,0.4)
                    url("./image/vui-unscreen.gif")
                    left top
                    no-repeat
                  `,
                  timer: 3000
                })
                setTimeout(() => {
                  location.reload()
                }, 3000);
            } else {
              console.log(response);
            }
          },
        });
    }
  });
  var modal = $(".modal");
  var btn = $(".btn_detail");
  var span = $(".modal-close");
  $.each(btn, function (indexInArray, valueOfElement) {
    valueOfElement.addEventListener("click", () => {
      $.ajax({
        type: "POST",
        url: "./templates/order_detail.php",
        data: {
          madh: valueOfElement.dataset.madh,
        },
        success: function (response) {
          console.log(response);
          $(".modal-body_main").html(response);
          modal.show();
          modal.css("display", "flex");
        },
      });
    });
  });
  span.click(function () {
    modal.hide();
  });

  $(window).on("click", function (e) {
    if ($(e.target).is(".modal")) {
      modal.hide();
    }
  });
  $(".btn_search").click(function () {
    $(".box_search").css("animation", "identifier 1s forwards");
  });
  $(".close_search").click(function () {
    $(".box_search").css("animation", "identifier_close 5s forwards");
  });
  $.each($(".button"), function (i, valueOfElement) {
    valueOfElement.addEventListener("click", () => {
      valueOfElement.classList.add("button_active");
      $.each($(".button"), function (j, item) {
        if (i !== j) item.classList.remove("button_active");
      });
    });
  });
  $(".icon_search_submit").click(function () {
    const key = $("#search").val();
    console.log(key);
    window.location.href = "?page=search&key=" + key;
  });
  $.each($(".btn_cancel"), function (index, HtmlElement) {
    HtmlElement.addEventListener("click", function () {
      // console.log(HtmlElement.dataset.madh);
      Swal.fire({
        title: 'Bạn có muốn hủy đơn hàng?',
        text: "Đơn hàng của bạn sẽ bị hủy:((",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hủy luôn!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "./templates/order.php",
            data: {
              madh: HtmlElement.dataset.madh,
              act: "cancel_order",
            },
            success: function (response) {
              console.log(response);
              if (response.trim() == "Đã hủy đơn hàng") {
                Swal.fire(
                  'Hủy đơn hàng!',
                  response,
                  'success'
                )
              }
              setTimeout(() => {
                location.reload();
              }, 2000);
            },
          });
        }
      })
      
    });
  });
});
var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined
        ? true
        : decodeURIComponent(sParameterName[1]);
    }
  }
  return false;
};

const pagi = () => {
  $.each($(".pagi-item"), function (i, item) {
    item.addEventListener("click", () => {
      data = {
        p: item.dataset.p,
        idLoai: getUrlParameter("idLoai"),
        sort: $("#sort").val(),
        page: getUrlParameter("page"),
        price_from: $("#price_from").val(),
        price_to: $("#price_to").val(),
        key: $("#search").val(),
      };
      $.ajax({
        type: "GET",
        url: "./templates/product_items.php",
        data: data,
        success: function (response) {
          console.log(response);
          $(".product-list").empty();
          $(".product-list").html(response);
        },
      });
    });
  });
};
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

const isRequired = (value) =>{
  return value === ""|| value ===undefined || value ===null?false:true;
}
const isPhone = (value)=>{
  //regex phone
  const reg= /^(84|0[3|5|7|8|9])+([0-9]{8})\b/g;
  return reg.test(value);
}
const isEmail = (value) =>{
  const reg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g ;
  return reg.test(value);   
}

const validate_payment = ()=>{
  console.log("validate_payment");

  let flag=true;
  const name          = document.getElementById('name');
  const email         = document.getElementById('email');
  const address       = document.getElementById('address');
  const city          = document.getElementById('city');
  const phone         = document.getElementById('phone');
  const items = document.querySelector('.form-payment').querySelectorAll('input');
  
  items.forEach(element => {
    if(!isRequired(element.value)) {
      flag = false;
      element.parentElement.querySelector('small').innerText="Trường này không được để trống"
    }else{
      element.parentElement.querySelector('small').innerText=""
    }
  });
  if(!isPhone(phone.value)){
    flag = false;
    phone.parentElement.querySelector('small').innerText="Số điện thoại không chính xác"
  }else{
    phone.parentElement.querySelector('small').innerText=""
  }
  if(!isEmail(email.value)){
    flag = false;
    email.parentElement.querySelector('small').innerText="Email không hợp lệ";
  }else{
    email.parentElement.querySelector('small').innerText="";
  }
  return flag;
}