document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
    // Your code to run since DOM is loaded and ready
    });


    /////////////valisation////////////////////
    
        var id_user =  document.getElementById('id_user');
        var first_Name =  document.getElementById('first_Name');
        var Last_Name =  document.getElementById('Last_Name');
        var Datesi =  document.getElementById('Date');
        var Salary =  document.getElementById('Salary');
        var Department =  document.getElementById('Department');
        var Functionsi =  document.getElementById('Function');
        var Imagesi =  document.getElementById('Image');
        var Submit = document.getElementById('Submit');
        var alpha = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;

        // Submit.addEventListener("click", function(){
            
        //   if (!first_Name.value.toUpperCase().match(alpha)) {
            
        //      alert("fgfg");
        //      first_Name.value = "";
        //      first_Name.style.backgroundColor = 'green';
        //   }
        //   });

     