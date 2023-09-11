const form = document.getElementById('form');

const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');

const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');

const grade = document.getElementById('grade');
const section = document.getElementById('section');
const schoolNumber = document.getElementById('schoolNumber');


form.addEventListener('submit', e =>{
	validateInputs();
});

const setSuccess = element => {
	const inputControl = element.parentElement;
	const errorDisplay = inputControl.querySelector('.error');

	errorDisplay.innerText = '';
	inputControl.classList.add('success');
	inputControl.classList.remove('error');
};

const setError = (element, message) => {
	const inputControl = element.parentElement;
	const errorDisplay = inputControl.querySelector('.error');

	errorDisplay.innerText = message;
	inputControl.classList.add('error');
	inputControl.classList.remove('success');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
	const firstNameValue = firstName.value.trim();
	const lastNameValue = lastName.value.trim();

	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();

	const gradeValue = grade.value.trim();
	const sectionValue = section.value.trim();
	const schoolNumberValue = schoolNumber.value.trim();


	if(firstNameValue === ''){
		setError(firstName, 'First name is required');
	}else{
		setSuccess(firstName);
	}

	if(lastNameValue === ''){
		setError(lastName, 'Last name is required');
	}else{
		setSuccess(lastName);
	}

	if(usernameValue === ''){
		setError(username, 'Username is required');
	}else{
		setSuccess(username);
	}

	if(emailValue === ''){
		setError(email, 'Email is required');
	}else if(!isValidEmail(emailValue)){
		setError(email, 'Provide a valid email address');
	}else{
		setSuccess(email);
	}

	if(passwordValue === ''){
		setError(password, 'Password is required');
	}else if(passwordValue.length < 8){
		setError(password, 'Password must be atleast 8 characters');
		console.log(passwordValue.length);
	}else{
		setSuccess(password);
	}

	if(gradeValue === ''){
		setError(grade, 'Grade is required');
	}else{
		setSuccess(grade);
	}

	if(sectionValue === ''){
		setError(section, 'Section is required');
	}else{
		setSuccess(section);
	}

	if(schoolNumberValue === ''){
		setError(schoolNumber, 'School number is required');
	}else{
		setSuccess(schoolNumber);
	}
};