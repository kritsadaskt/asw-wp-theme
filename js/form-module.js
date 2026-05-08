document.addEventListener('DOMContentLoaded', function() {
    const formModule = document.getElementById('form-module');

    if (!formModule) return;
    
    const flowKey = formModule.dataset.flow;
    let bgImage = '';

    if (formModule.dataset.bgimage) {
        bgImage = formModule.dataset.bgimage;
    }

    //console.log(bgImage);
    
    if (!formModule) return;
    
    // Get endpoint URL from data attribute or use default
    const endpointUrl = 'https://node.assetwise.dev/webhook/centralize-workflow';
    
    // Get UTM parameters from URL
    const urlParams = new URLSearchParams(window.location.search);
    const utmParams = {
        utm_source: urlParams.get('utm_source') || '',
        utm_medium: urlParams.get('utm_medium') || '',
        utm_campaign: urlParams.get('utm_campaign') || '',
        utm_content: urlParams.get('utm_content') || '',
        utm_id: urlParams.get('utm_id') || '',
        utm_term: urlParams.get('utm_term') || ''
    };
    
    // Inject styles
    injectStyles();
    
    const form = document.createElement('form');
    form.className = 'contact-form';
    form.setAttribute('novalidate', '');
    
    const formHTML = `
        <div class="form-group">
            <label for="companyName">Company Name <span class="required">*</span></label>
            <input 
                type="text" 
                id="companyName" 
                name="companyName" 
                class="form-control" 
                required
                placeholder="Enter company name"
            >
            <span class="error-message"></span>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="firstName">First Name <span class="required">*</span></label>
                <input 
                    type="text" 
                    id="firstName" 
                    name="firstName" 
                    class="form-control" 
                    required
                    placeholder="Enter first name"
                >
                <span class="error-message"></span>
            </div>
            
            <div class="form-group">
                <label for="lastName">Last Name <span class="required">*</span></label>
                <input 
                    type="text" 
                    id="lastName" 
                    name="lastName" 
                    class="form-control" 
                    required
                    placeholder="Enter last name"
                >
                <span class="error-message"></span>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="phoneNumber">Phone Number <span class="required">*</span></label>
                <input 
                    type="tel" 
                    id="phoneNumber" 
                    name="phoneNumber" 
                    class="form-control" 
                    required
                    placeholder="Enter phone number"
                >
                <span class="error-message"></span>
            </div>
            
            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control" 
                    required
                    placeholder="Enter email address"
                >
                <span class="error-message"></span>
            </div>
        </div>
        
        <div class="form-group checkbox-group">
            <label class="checkbox-label">
                <input 
                    type="checkbox" 
                    id="termsAccepted" 
                    name="termsAccepted" 
                    class="form-checkbox" 
                    required
                >
                <span class="checkbox-text">The company will collect your information to inform you of any news and information related to the Company's products and services and we will offer other interesting projects. Click here to our <a href="https://assetwise.co.th/privacy-policy/" target="_blank">Privacy Policy</a> <span class="required">*</span></span>
            </label>
            <span class="error-message"></span>
        </div>
        
        <!-- Hidden UTM fields -->
        <input type="hidden" name="utm_source" value="${utmParams.utm_source}">
        <input type="hidden" name="utm_medium" value="${utmParams.utm_medium}">
        <input type="hidden" name="utm_campaign" value="${utmParams.utm_campaign}">
        <input type="hidden" name="utm_content" value="${utmParams.utm_content}">
        <input type="hidden" name="utm_id" value="${utmParams.utm_id}">
        <input type="hidden" name="utm_term" value="${utmParams.utm_term}">
        
        <div class="form-actions">
            <button type="submit" class="btn-submit">Submit</button>
        </div>
    `;
    
    form.innerHTML = formHTML;
    
    // Form validation and submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm(form)) {
            const submitBtn = form.querySelector('.btn-submit');
            const originalText = submitBtn.textContent;
            
            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';
            
            const formData = {
                timestamp: (() => {
                    const date = new Date(new Date().toLocaleString('en-US', { timeZone: 'Asia/Bangkok' }));
                    const pad = n => n.toString().padStart(2, '0');
                    const y = date.getFullYear();
                    const m = pad(date.getMonth() + 1);
                    const d = pad(date.getDate());
                    const h = pad(date.getHours());
                    const min = pad(date.getMinutes());
                    const s = pad(date.getSeconds());
                    return `${y}-${m}-${d} ${h}:${min}:${s}`;
                })(),
                companyName: form.companyName.value.trim(),
                firstName: form.firstName.value.trim(),
                lastName: form.lastName.value.trim(),
                phoneNumber: form.phoneNumber.value.trim(),
                email: form.email.value.trim(),
                termsAccepted: form.termsAccepted.checked,
                utm_source: form.utm_source.value,
                utm_medium: form.utm_medium.value,
                utm_campaign: form.utm_campaign.value,
                utm_content: form.utm_content.value,
                utm_id: form.utm_id.value,
                utm_term: form.utm_term.value,
                flow_key: flowKey
            };
            
            // console.log('Form submitted:', formData);
            // console.log('Endpoint URL:', endpointUrl);
            
            // Send data to webhook
            fetch(endpointUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Success:', data);
                
                // Reset button to default state
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
                
                // Get current path and add /thank-you
                const currentPath = window.location.pathname;
                const thankYouPath = currentPath.endsWith('/') 
                    ? currentPath + 'thank-you' 
                    : currentPath + '/thank-you';
                
                // Redirect to thank you page
                // console.log('Redirecting to:', thankYouPath);
                // console.log('Current path:', currentPath);
                window.location.href = thankYouPath;
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
                
                // Show error message
                showErrorMessage(form, 'There was an error submitting the form. Please try again.');
            });
        }
    });
    
    // Add real-time validation on input
    const inputs = form.querySelectorAll('input[required]');
    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            input.addEventListener('change', function() {
                validateSingleField(this);
            });
        } else {
            input.addEventListener('blur', function() {
                validateSingleField(this);
            });
            
            input.addEventListener('input', function() {
                if (this.classList.contains('error')) {
                    validateSingleField(this);
                }
            });
        }
    });
    
    formModule.appendChild(form);
    
    // Validation function
    function validateForm(form) {
        let isValid = true;
        const inputs = form.querySelectorAll('input[required]');
        
        inputs.forEach(input => {
            const errorSpan = input.closest('.form-group').querySelector('.error-message');
            
            // Clear previous errors
            input.classList.remove('error');
            errorSpan.textContent = '';
            
            if (input.type === 'checkbox') {
                if (!input.checked) {
                    showError(input, errorSpan, 'You must accept the terms and conditions');
                    isValid = false;
                }
            } else {
                const value = input.value.trim();
                
                if (!value) {
                    showError(input, errorSpan, 'This field is required');
                    isValid = false;
                } else if (input.type === 'email' && !isValidEmail(value)) {
                    showError(input, errorSpan, 'Please enter a valid email address');
                    isValid = false;
                } else if (input.type === 'tel' && !isValidPhone(value)) {
                    showError(input, errorSpan, 'Please enter a valid phone number');
                    isValid = false;
                }
            }
        });
        
        return isValid;
    }
    
    function showError(input, errorSpan, message) {
        input.classList.add('error');
        errorSpan.textContent = message;
        errorSpan.style.display = 'block';
    }
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    function isValidPhone(phone) {
        const phoneRegex = /^[\d\s\-\+\(\)]+$/;
        return phoneRegex.test(phone) && phone.replace(/\D/g, '').length >= 10;
    }
    
    function validateSingleField(input) {
        const errorSpan = input.closest('.form-group').querySelector('.error-message');
        
        input.classList.remove('error');
        errorSpan.textContent = '';
        
        if (input.type === 'checkbox') {
            if (!input.checked) {
                showError(input, errorSpan, 'You must accept the terms and conditions');
                return false;
            }
        } else {
            const value = input.value.trim();
            
            if (!value) {
                showError(input, errorSpan, 'This field is required');
                return false;
            } else if (input.type === 'email' && !isValidEmail(value)) {
                showError(input, errorSpan, 'Please enter a valid email address');
                return false;
            } else if (input.type === 'tel' && !isValidPhone(value)) {
                showError(input, errorSpan, 'Please enter a valid phone number');
                return false;
            }
        }
        
        return true;
    }
    
    function showSuccessMessage(form) {
        const existingMessage = form.querySelector('.success-message');
        if (existingMessage) {
            existingMessage.remove();
        }
        
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.innerHTML = `
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM8 15L3 10L4.41 8.59L8 12.17L15.59 4.58L17 6L8 15Z" fill="currentColor"/>
            </svg>
            <span>Form submitted successfully!</span>
        `;
        
        form.insertBefore(successDiv, form.firstChild);
        
        setTimeout(() => {
            successDiv.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => successDiv.remove(), 300);
        }, 4000);
    }
    
    function showErrorMessage(form, message) {
        const existingMessage = form.querySelector('.error-notification');
        if (existingMessage) {
            existingMessage.remove();
        }
        
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-notification';
        errorDiv.innerHTML = `
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM11 15H9V13H11V15ZM11 11H9V5H11V11Z" fill="currentColor"/>
            </svg>
            <span>${message}</span>
        `;
        
        form.insertBefore(errorDiv, form.firstChild);
        
        setTimeout(() => {
            errorDiv.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => errorDiv.remove(), 300);
        }, 5000);
    }
    
    function injectStyles() {
        if (document.getElementById('form-module-styles')) return;
        
        const style = document.createElement('style');
        style.id = 'form-module-styles';
        style.textContent = `
            #form-module {
                padding: 3rem 1rem;
                background-image: url('${bgImage}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
            
            .contact-form {
                background: #ffffff;
                max-width: 600px;
                margin: 0 auto;
                padding: 30px;
                border-radius: 5px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07), 0 2px 4px rgba(0, 0, 0, 0.05);
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            }
            
            .form-row {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 16px;
                margin-bottom: 15px;
            }
            
            .form-group {
                margin-bottom: 15px;
                position: relative;
            }
            
            .form-row .form-group {
                margin-bottom: 0;
            }
            
            .form-group label {
                display: block;
                margin-bottom: 8px;
                font-weight: 600;
                color: #2d3748;
                font-size: 14px;
                letter-spacing: 0.3px;
            }
            
            .required {
                color: #e53e3e;
                font-weight: 700;
            }
            
            .form-control {
                width: 100% !important;
                padding: 10px 14px;
                font-size: 14px;
                line-height: 1.5;
                color: #2d3748;
                background-color: #ffffff;
                border: 2px solid #e2e8f0;
                border-radius: 5px;
                box-sizing: border-box;
                transition: all 0.2s ease-in-out;
                font-family: inherit;
            }
            
            .form-control:focus {
                outline: none;
                border-color: #4299e1;
                box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
                background-color: #ffffff;
            }
            
            .form-control:hover:not(:focus) {
                border-color: #cbd5e0;
            }
            
            .form-control::placeholder {
                color: #a0aec0;
            }
            
            .form-control.error {
                border-color: #fc8181;
                background-color: #fff5f5;
            }
            
            .form-control.error:focus {
                border-color: #e53e3e;
                box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1);
            }
            
            .error-message {
                display: none;
                margin-top: 5px;
                color: #e53e3e;
                font-size: 12px;
                min-height: 16px;
                font-weight: 500;
            }
            
            /* Checkbox styling */
            .checkbox-group {
                margin-bottom: 20px;
            }
            
            .checkbox-label {
                display: flex;
                align-items: flex-start;
                gap: 10px;
                cursor: pointer;
                user-select: none;
            }
            
            .form-checkbox {
                width: 18px;
                height: 18px;
                margin-top: 2px;
                cursor: pointer;
                flex-shrink: 0;
                accent-color: #667eea;
            }
            
            .checkbox-text {
                font-size: 14px;
                color: #2d3748;
                line-height: 1.5;
            }
            
            .checkbox-text a {
                color: #667eea;
                text-decoration: none;
                font-weight: 600;
                transition: color 0.2s;
            }
            
            .checkbox-text a:hover {
                color: #764ba2;
                text-decoration: underline;
            }
            
            .form-checkbox.error {
                outline: 2px solid #fc8181;
                outline-offset: 2px;
            }
            
            .form-actions {
                margin-top: 20px;
                padding-top: 20px;
                border-top: 1px solid #e2e8f0;
            }
            
            .btn-submit {
                width: 100%;
                padding: 12px 20px;
                font-size: 14px;
                font-weight: 600;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: all 0.2s ease-in-out;
                font-family: inherit;
                letter-spacing: 0.3px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: #ffffff;
                box-shadow: 0 4px 6px rgba(102, 126, 234, 0.25);
            }
            
            .btn-submit:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(102, 126, 234, 0.35);
            }
            
            .btn-submit:active {
                transform: translateY(0);
                box-shadow: 0 2px 4px rgba(102, 126, 234, 0.25);
            }
            
            /* Input animations */
            .form-control:focus + .error-message {
                animation: fadeIn 0.3s ease-in-out;
            }
            
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-5px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            /* Responsive design */
            @media (max-width: 640px) {
                .contact-form {
                    padding: 20px 16px;
                }
                
                .form-row {
                    grid-template-columns: 1fr;
                    gap: 15px;
                }
            }
            
            /* Loading state */
            .btn-submit:disabled {
                background: #cbd5e0;
                cursor: not-allowed;
                transform: none;
            }
            
            .btn-submit:disabled:hover {
                transform: none;
                box-shadow: none;
            }
            
            /* Success message */
            .success-message {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px 16px;
                background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
                color: #ffffff;
                border-radius: 5px;
                margin-bottom: 16px;
                font-weight: 600;
                font-size: 14px;
                box-shadow: 0 4px 6px rgba(72, 187, 120, 0.25);
                animation: slideDown 0.3s ease-out;
            }
            
            .success-message svg {
                flex-shrink: 0;
            }
            
            /* Error notification */
            .error-notification {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px 16px;
                background: linear-gradient(135deg, #fc8181 0%, #e53e3e 100%);
                color: #ffffff;
                border-radius: 5px;
                margin-bottom: 16px;
                font-weight: 600;
                font-size: 14px;
                box-shadow: 0 4px 6px rgba(229, 62, 62, 0.25);
                animation: slideDown 0.3s ease-out;
            }
            
            .error-notification svg {
                flex-shrink: 0;
            }
            
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            @keyframes fadeOut {
                from {
                    opacity: 1;
                    transform: translateY(0);
                }
                to {
                    opacity: 0;
                    transform: translateY(-10px);
                }
            }
        `;
        
        document.head.appendChild(style);
    }
});

