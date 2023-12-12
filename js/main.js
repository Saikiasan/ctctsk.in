  $(document).on('keydown', function (e) {
    if (e.ctrlKey && e.key === 'b') {
      let timerInterval;
      Swal.fire({
        title: 'Loading Services',
        html: 'This will take a moment, please wait',
        timer: 2100,
        didOpen: function () {
          Swal.showLoading();
          const b = Swal.getHtmlContainer().querySelector('b');
          timerInterval = setInterval(function () {
            b.textContent = Swal.getTimerLeft();
          }, 100);
        },
        willClose: function () {
          clearInterval(timerInterval);
        }
      }).then(function (result) {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          window.location.href = 'admin/';
        }
      });
    }
    if (e.ctrlKey && e.key === 'a') {
      if (document.fullscreenElement) {
        document.exitFullscreen();
      } else {
        document.documentElement.requestFullscreen();
      }
    }
    if (e.key == 70) {
      e.preventDefault();
      window.requestFullscreen()
    }

  });
  

 


const inProgress = () => {
  Swal.fire({
    title: 'Link not active',
    text: 'Wait for the link to be activated in the future.',
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    showClass: {
      popup: 'animated fadeInDown faster'
    },
    hideClass: {
      popup: 'animated fadeOutUp faster'
    },
  })
}