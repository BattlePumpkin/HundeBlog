function checkform()
{
	if(!usernamecheck())
		return false;
	else if(!emailcheck())
		return false;
	else if(!passwordcheck())
		return false;
	else if(!passwordconfirmcheck())
		return false;
}

function usernamecheck()
{
	var username = document.getElementById("username");

	if(username.value.length < 5)
	{
		username.style.backgroundColor = "#F95E5E";
		return false;
	}
	else
	{
		username.style.backgroundColor = "#66cc66";
		return true;
	}
}
function passwordcheck()
{
	var password = document.getElementById("password");

	if(password.value.length < 8)
	{
		password.style.backgroundColor = "#F95E5E";
		return false;
	}
	else
	{
		password.style.backgroundColor = "#66cc66";
		return true;
	}
}

function emailcheck()
{
	var email = document.getElementById("email");
	var emailRegex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
	if(emailRegex.test(email.value))
	{
		email.style.backgroundColor = "#66cc66";
		return true;	
	}
	else
	{
		email.style.backgroundColor = "#F95E5E";
		return false;
	}
}

function passwordconfirmcheck()
{
	var password = document.getElementById("password");
	var passwordconfirm = document.getElementById("passwordconfirm");
	if(passwordconfirm.value != password.value | passwordconfirm.value  == "")
	{
		passwordconfirm.style.backgroundColor = "#F95E5E";
		return false;
	}
	else
	{
		passwordconfirm.style.backgroundColor = "#66cc66";
		return true;
	}
}

function checkformpost()
{
	var title = document.getElementById("titleform");
	var summary = document.getElementById("summary");
	var content = document.getElementById("content");

	if(title.value == "" || title.value == " ")
	{
		title.style.backgroundColor = "#F95E5E";
		return false;
	}
	else
	{
		title.style.backgroundColor = "#66cc66";
		if(summary.value == "" || summary.value == " ")
		{
			summary.style.backgroundColor = "#F95E5E";
			return false;
		}
		else
		{
			summary.style.backgroundColor = "#66cc66";
			if(content.value == "" || content.value == " ")
			{
				content.style.backgroundColor = "#F95E5E";
				return false;
			}
			else
			{
				content.style.backgroundColor = "#66cc66";
				return true;
			}
		}
	}
}
