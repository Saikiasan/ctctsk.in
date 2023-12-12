<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
include('admin/db_connect.php');
ob_start();
  $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
  foreach ($query as $key => $value) {
    if(!is_numeric($key))
    $_SESSION['system'][$key] = $value;
  }
ob_end_flush();
include('header.php');
?>
  <style>
	body{
        background: #80808045;
  }
  .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }
  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
  #viewer_modal .btn-close {
    position: absolute;
    z-index: 999999;
    background: unset;
    color: #ff0000;
    border: unset;
    font-size: 40px;
    top: 0px;
    right: 0px;
}
  #viewer_modal .modal-content {
       background: black;
    border: unset;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  #viewer_modal img,#viewer_modal video{
    max-height: calc(100%);
    max-width: calc(100%);
  }

</style>

<body id="page-top" class="<?php echo $_SESSION['system']['theme'] ?>">
  <!-- <div id="preloader"></div> -->

  <?php 
  function getFileType($extention){
    switch($extention){
      case 'pdf': return 'file-pdf';
      case 'jpg': return 'file-jpg';
      case 'jpeg': return 'file-image';
      case 'png': return 'file-png';
      case 'docx': case 'doc': return 'file-doc';
      case 'gif': return 'file-gif';
      case 'html': return 'file-html';
      case 'txt': return 'file-txt';
      // blank,archive,css,export,find,import,js,json,md,plus
      default: return 'pencil';
    }
  }
  include('navbar.php');
  $page = isset($_GET['page']) ? $_GET['page'] : "home";
  $pagePath = 'pages/'.$page.'.php';
  if (file_exists($pagePath)) {
    include($pagePath);
  } else {
    include('pages/home.php');
  }
  include('footer.php'); 
  ?>

  <a class="position-fixed top-50 end-0 mb-5 me-3" href="#page-top" id="to-top">
    <i class="ion ion-chevron-up fa-2x btn btn-dark rounded-2  border border-2 border-danger"></i>
  </a>

  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <button type="button" class="btn btn-close" data-bs-dismiss="modal"><span class="fa fa-times"></span></button>
        <img src="" alt="">
      </div>
    </div>
  </div>
<script type="text/javascript">
  $(window).on('load resize', function () {
    $('#preloader').fadeOut(500)
    $('#to-top').fadeOut()
    $(window).scroll(function () {
      if ($(this).scrollTop() > 200) {
        $('#to-top').fadeIn();
      } else {
        $('#to-top').fadeOut();
      }
    });
  });
  const uni_modal = ($title = '', $url = '', $size = '', $backdrop = '', $keyboard = '') => {
    $.ajax({
      url: $url,
      error: err => {
        console.log(err)
      },
      success: function (resp) {
        if (resp) {
          $('#uni_modal .modal-title').html($title)
          $('#uni_modal .modal-body').html(resp)
          if ($size != '') {
            $('#uni_modal .modal-dialog').addClass($size)
          } else {
            $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
          }

          if ($backdrop != '') {
            $('#uni_modal').attr('data-bs-backdrop', $backdrop)
          } else {
            $('#uni_modal').attr('data-bs-backdrop', 'static')
          }

          if ($keyboard != '') {
            $('#uni_modal').attr('data-bs-keyboard', $keyboard)
          } else {
            $('#uni_modal').attr('data-bs-keyboard', 'false')
          }

          $('#uni_modal').modal('show')
        }
      }
    })
  }

  $('#login').on('click', function () {
    console.log('clicked btn')
    uni_modal("Login", 'login.php', 'modal-md modal-dialog-centered', true, false)
  })
</script>
<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }
 window.viewer_modal = function($src = ''){
    start_load()
    var t = $src.split('.')
    t = t[1]
    if(t =='mp4'){
      var view = $("<video src='"+$src+"' controls autoplay></video>")
    }else{
      var view = $("<img src='"+$src+"' />")
    }
    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
    $('#viewer_modal .modal-content').append(view)
    $('#viewer_modal').modal({
            backdrop: true,
            keyboard: false,
            focus: true,
          }).modal('show')
          end_load()  

}
  window.uni_modal = function($title = '' , $url='',$size=""){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal({
                  backdrop:'static',
                  keyboard:false,
                  focus:true
                }).modal('show')
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
  }
  // TODO: use sweet-alert
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }

  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
  $('.datetimepicker').datetimepicker({
      format:'Y/m/d H:i',
      startDate: '+3d'
  })
  $('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })
</script>	
</body>
<?php $conn->close() ?>
</html>

<!-- 
Copyright © 2023 Ankit Saikia. All rights reserved.

This PHP project, titled "College Management Site," was submitted as the major project for the Bachelor of Computer Applications (BCA) program at C.T. College, affiliated with Assam Science and Technology University (ASTU), in the year 2023. This includes, but is not limited to, its source code, documentation, and related materials, all of which are protected by copyright law.

You, Ankit Saikia, as the author and copyright holder, hereby grant permission for the use, modification, and distribution of this project for educational and non-commercial purposes by C.T. College faculty, students, and authorized personnel.

Any use, reproduction, distribution, or modification of this project for commercial purposes or without proper attribution is strictly prohibited without the express written consent of the copyright holder, Ankit Saikia.

For inquiries or permissions related to this project, please contact:
- Phone: +918257068226 (WhatsApp available)

This copyright notice is subject to change without notice and should be reviewed regularly for updates.
-->
