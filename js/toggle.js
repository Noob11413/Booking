function toggleNav()
        {
            var x = document.getElementById("Navbar");
            var y = document.getElementById("main");
            if (x.style.width == "230px") 
            {
                x.style.width = "0px";
                y.style.marginLeft = "0px";
            }
            else 
            {
                x.style.width = "230px";
                y.style.marginLeft = "230px";
            }
        }
function sure()
        {
            var x = confirm("Are you sure you want to log out?");
            if (x == true) {
            window.location.replace('index.html');
            }
        }