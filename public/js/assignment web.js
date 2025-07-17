window.onload = function() {
    document.getElementById("resultForm").onsubmit=function(e) {
        const marks =+ document.getElementById("marks").value;

        if (marks>100 || marks<0 ){
        alert("Marks must be between 0 and 100");
        e.preventDefault();
        }
    };  
};