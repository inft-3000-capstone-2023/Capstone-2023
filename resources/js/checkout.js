(() => {
    let cookieName = "ticketNum";
    function increaseTicketNum(){

    }
    function setTicketNum(val) {
        let expires;
        let days = 10;
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        else {
            expires = "";
        }
        document.cookie = escape(cookieName) + "=" + escape(val) + expires + "; path=/";
    }

    function createTicketNum(){
        setTicketNum(1);
    }

    function getTicketNum() {
        let name = cookieName + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function increaseTicketNum(){
        let newNum
        if(getTicketNum() != ""){
            newNum = getTicketNum() + 1;
        } else {
            newNum = 1;
        }
        setTicketNum(newNum);
    }

    function decreaseTicketNum(){
        let newNum
        if(getTicketNum() != ""){
            newNum = getTicketNum() - 1;
        } else {
            newNum = 1;
        }
        setTicketNum(newNum);
    }

    let plusBtn = document.getElementById("increaseTicketNum");
    plusBtn.addEventListener("click", increaseTicketNum);

    let minusBtn = document.getElementById("decreaseTicketNum");
    minusBtn.addEventListener("click", decreaseTicketNum);

    createTicketNum();
    alert("JS working")
})()
