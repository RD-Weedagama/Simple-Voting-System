<html>
<header>
    <!--Sweet Alert Codes-->
    <!--JQuery CDN-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--Sweet Alert CDN-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</header>
<body>

<input type="button" class="delete" value="sweet">

<script>
    $('.delete').on('click',function (e) {
        e.preventDefault();
        var self = $(this);
        console.log(self.data('title'));
        Swal.fire({
            title: 'Thanks for voting',
            text: "Your vote has been recorded.",
            icon: 'success',
            
            confirmButtonColor: '#FFC107',
           
            
        }),function(){ 
          $(".confirm").attr('disabled', 'disabled'); 

        }
        
       

    })

</script>
</body>
</html>