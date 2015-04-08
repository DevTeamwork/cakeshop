
//--------- login -------------------
//function customRegister(){
//    var website_id = $('#website_id').val();
//    $.ajax({
//        url: 'index.php?r=Sites/CustomRegister'
//        , data: {
//            id: website_id
//        }
//        , success: function(data) {
//            $('#page-wrapper').html(data);
//        }
//    });
//}

function register(data,website_id){
//       console.log("data : "+data);
//        alert('Register');
    $.ajax({
        url: 'index.php?r=Sites/Register',
        data: data,
        type: "POST",
        success: function(data) {
//            alert(data);
            if (data == '1') {
                alert(" สำเร็จ"); 
                location.href = "index.php?r=Sites/Index&id="+website_id;                
            } else {
                alert("ผิดพลาด");
            }
        }
    });
}





function siteManager(website_id) {
    //  alert("siteManager :"+id);
    $.ajax({
        url: 'index.php?r=Site/SiteManager'
        , data: {
            website_id: website_id
        }
        , success: function(data) {

            $('#content').html(data);
            $("#containerMain").hide();
        }
    });

    return false;
}

function dashboard() {
//    alert('dashboard()');
    $.ajax({
        url: 'index.php?r=Websites/Dashboard'
        , success: function(data) {
            $('#pagewrapper').html(data);
        }
    });
    return false;
}


function getAllUsers() {
//        alert('getAllUsers()');
    $.ajax({
        url: 'index.php?r=Site/GetAllUsers'
        , success: function(data) {
            $('#pagewrapper').html(data);
        }
    });

    return false;
}

function gallerys() {
//    alert('Gallerys()');
    $.ajax({
        url: 'index.php?r=Site/Gallerys'
        , success: function(data) {
            $('#pagewrapper').html(data);
        }
    });

    return false;
}


function publishedAdmin() {
    $.ajax({
        url: 'index.php?r=Site/PublishedAdmin'
        , success: function(data) {
            $('#pagewrapper').html(data);
        }
    });
}


function contactAdmin() {
    $.ajax({
        url: 'index.php?r=Site/ContactAdmin'
        , success: function(data) {
            $('#pagewrapper').html(data);
        }
    });
}

function menuSite() {
//    alert("click menu");
    $.ajax({
        url: 'index.php?r=Site/MenuSite'
        , success: function(data) {
            $('#menusite').html(data);
        }
    });

    return false;
}
//--------------------------Portfolio--begin------------------------
function portfolioAdmin(id) {
//    alert("portfolioAdmin :"+website_id);
    //PortfolioAdmin
    $.ajax({
        url: 'index.php?r=Portfolios/Index'
        , data: {
            id: id
        }
        , success: function(data) {
            $('#pagewrapper').html(data);
        }
    });
    //return false;
}

function savePortfolio() {
//    var editer = $('#editor1').val();
    var data = $('#formPortfolio').serialize();
//    alert("savePortfolio: " +data);
    var website_id = $('#website_id').val();
    $.ajax({
        url: 'index.php?r=site/SavePortfolio',
        type: 'POST',
        data: $("#formPortfolio").serialize(),
        success: function(data) {
            alert(data);
            if (data = 'success') {
                alert("บันทึกแล้ว");
//                sites();
//                $('#home').removeClass('');
//                listPortfolios(website_id);
//                $('#website_id').val("");
                $('#home').hide();
//                $('#home').removeClass('active');
                
//                $('#profile').addClass('active');
                $('#profile').show();
                
            } else {
                alert(data);
            }
        }
    });
    // return false;
}

function listPortfolios(website_id) {
//    alert("listportfolios : "+website_id);
    $.ajax({
        url: 'index.php?r=site/ListPortfolios'
        , data: {
            website_id: website_id
        }
        , success: function(data) {
            $('#profile').html(data);
        }
    });
}

//--------------------------Portfolio--end------------------------
//--------------------------sites--begin------------------------
function saveWebsite(){
    alert("saveWebsite");
//    $.ajax({
//        url: 'index.php?r=websites/SaveSite',
//        type: 'POST',
//        data: data,
//        success: function(data) {
//            if (data == '1') {
//                alert("บันทึกแล้ว");
//                location.href = "index.php?r=websites/index";
//            } else {
//                alert(data);
//            }
//        }
//    });

    return false;
    
}




//--------------------------sites--begin------------------------
