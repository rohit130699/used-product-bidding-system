<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student Detail</title>
    <style>
        body{
            margin:0;
            padding: 0;
            background-color: rgb(228, 223, 245);
            width: 100%;
        }
        nav{
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            box-shadow: 2px 2px 2px rgb(140, 91, 247);
            background-color: rgb(240, 238, 231);
            box-sizing: border-box;
        }
        header{
            width: 100%;
        }
        nav>a{
            text-decoration: none;
        }
        .mainName{
            font-size: 1.3rem;
            font-weight: 900;
            letter-spacing: 2px;
            margin-right:20px;
            padding: 0.5rem;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: rgb(169, 90, 243);
            border-radius: 10px;
            transform: rotate(-8deg);
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            color: rgb(231, 213, 213);
        }
        .mainName:hover{
            transform: rotate(0deg);
        }
        .statement{
            font-weight: 900;
            font-size: 1.2rem;
            letter-spacing: 2px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        main{
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: center;
            box-sizing: border-box;
        }
        .logintext{
            font-size: 1.6rem;
            margin:0;
            font-weight: 900;
            letter-spacing: 0.2rem;
            word-spacing: 0.2rem;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: rgb(34, 25, 12);
            text-shadow: 1px 1px 3px rgb(77, 71, 71);
            padding: 0.3rem;
        }
        .form{
            padding: 1rem;
            border-radius: 1rem;
            margin:0 2rem;
            box-shadow: 3px 3px 6px rgb(34, 33, 33);
            background-color: rgb(255, 255, 255);
}
.inputs{
    margin: 1rem 0;
    padding: 0.5rem;
    width: 100%;
    letter-spacing: 2px;
    border: 1px solid black;
    outline: none;
    border-radius: 0.3rem;
    font-size: 0.8rem;
    background-color: rgb(240, 235, 235);
}
.loginbtn,.reset{
    padding: 0.5rem 2rem;
    background-color: rgb(145, 105, 255);
    border:0;
    font-weight: 600;
    outline: none;
    color: whitesmoke;
    border-radius: 10px;
    margin: 0 0 1rem 0;
    font-size: 1rem;
    transition: all 1s;
    cursor: pointer;
}.reset{
    background-color: rgb(105, 103, 100);
}
.names,.contacts,.academics,.feesdetails,.addresses{
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.ids{
    display: grid;
    grid-template-columns: auto auto;
}
.ids>div{
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.extraDetails{
    display: grid;
    grid-template-columns: auto auto;
    grid-column-gap: 1rem;
}
.extraDetails>div{
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.extraDetails>input{
    width: 94%;
}
        .toggle-div{
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }
            .toggle-div input{
                position: absolute;
                height: 1px;
                width: 1px;
                border: none;
                overflow: hidden;
            }
            .toggle-div label{
                background-color: rgb(226, 209, 209);
                color: black;
                font-size: 1.1rem;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-weight: 900;
                text-align: center;
                padding: 5px 10px;
                transition: all 0.2s ease-in-out;
            }
            .toggle-div label:hover{
                cursor: pointer;
            }
            .toggle-div input:checked + label{
                background-color: rgb(158, 88, 250);
                color: cornsilk;
            }
            .toggle-div label:first-of-type{
                border-radius: 6px 0 0 6px;
            }
            .toggle-div label:last-of-type{
                border-radius:0 6px 6px 0;
            }
.names input:first-of-type,.contacts input:first-of-type,.credentials input:first-of-type,.academics .inputs:first-of-type,.feesdetails input:first-of-type{
    margin-right: 0.8rem;
}
.addresses>textarea{
    resize: none;
    width: 100%;
    font-size: 1rem;
}
.btns{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-self: center;
    width: 30%;
}
        @media(max-width:720px){
            .mainName{
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 0.3rem;
            transform: rotate(-5deg);
        }
        .names,.contacts,.academics,.feesdetails,.addresses{
    flex-direction: column;
}
.names input:first-of-type,.contacts input:first-of-type,.credentials input:first-of-type,.academics .inputs:first-of-type,.feesdetails input:first-of-type{
    margin-right: 0;
}
.ids{
    grid-template-columns: auto;
}
.ids .inputs{
    width: 97%;
}
.extraDetails{
    grid-template-columns:auto;
    grid-column-gap: 0;
}
        }
    </style>
</head>
<body>
    <header>
        <nav><div class="mainName">S.N. Classes</div>
            <div class="statement">Your Way to manage the Classes....</div>
        </nav>
        <main>
            <h2 class="logintext">Add New Student Details.</h2>
            <form class="form formData" name="f1" action = "studentstore.php" method="post">
                <div class="names">
                    <input type="text" name="fname" pattern="[A-Za-z]{1,30}" title="Please enter valid name eg(Rahul)" placeholder="Enter Student First Name" class="inputs" required/>
                    <input type="text" name="lname" pattern="[A-Za-z]{1,30}" title="Please enter valid name eg(Singh)" placeholder="Enter Student Last Name" class="inputs" required/>
                </div>
                <div class="ids">
                    <input type="number" min="1" name="stu_id" pattern="[0-9]+" title="Please enter valid id(only numbers)" placeholder="Enter Student Id" class="inputs" required/>
                    <div>
                        <label>Gender : </label>
                        <div class="toggle-div">
                            <input type="radio" id="male" name="gender" value="male" checked/>
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female"/>
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="academics">
                    <select name="std" class="inputs">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    </select>
                    <select name="med" class="inputs">
                        <option value="Hindi">Hindi</option>
                        <option value="English">English</option>
                    </select>
                </div>
                <div class="feesdetails">
                    <input type="number" name="feemon" pattern="[0-9]+" title="Enter a valid Fees details" placeholder="Enter Fees Details" class="inputs" required/> 
                    <input type="number" name="actfee" pattern="[0-9]+" title="Enter a valid Fees details" placeholder="Enter Actual Fees Details" class="inputs" required/> 
                </div>
               <div class="extraDetails">
                   <div>
                    Date of Joining: 
                    <input type="date" name="doj" placeholder="Enter Date of Joining" class="inputs" required/>
                   </div>
                    <input type="number" name="downp" pattern="[0-9]+" title="Please enter valid details" placeholder="Enter Down payment details" class="inputs" required/>
               </div>
                <div class="contacts">
                    <input type="number" name="c_no" placeholder="Enter Contact number"
                    pattern="[9876][0-9]{9}+" title="Please enter valid contact details" class="inputs" required/>
                    <input type="email" name="gmail" placeholder="Enter Student Email ID" class="inputs" required autocomplete="off"/>
                </div>
                <div class="addresses">
                    <textarea rows="1" class="inputs textarea" name="add" placeholder="Enter your Address" required></textarea>
                </div>
                    <button class="loginbtn">Add Details</button><br>
                    <input class="loginbtn reset" type="reset" value="Reset"/>
            </form>
         </main>
    </header>
</body>
</html>