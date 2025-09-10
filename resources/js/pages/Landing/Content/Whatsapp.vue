<script setup lang="ts">
import { ref, computed } from 'vue';

interface FormData {
  name: string;
  representing: string;
  isRepresentingMyself: boolean;
  topic: string;
  email: string;
}

const formData = ref<FormData>({
  name: '',
  representing: '',
  isRepresentingMyself: false,
  topic: '',
  email: ''
});

const errors = ref<Partial<FormData>>({});

const validateForm = (): boolean => {
  errors.value = {};
  
  if (!formData.value.name.trim()) {
    errors.value.name = 'Name is required';
  }
  
  if (!formData.value.isRepresentingMyself && !formData.value.representing.trim()) {
    errors.value.representing = 'Please specify who you represent or check "myself"';
  }
  
  if (!formData.value.topic.trim()) {
    errors.value.topic = 'Please specify what you\'d like to discuss';
  }
  
  if (formData.value.email && !isValidEmail(formData.value.email)) {
    errors.value.email = 'Please enter a valid email address';
  }
  
  return Object.keys(errors.value).length === 0;
};

const isValidEmail = (email: string): boolean => {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
};

const whatsappMessage = computed(() => {
  const representingText = formData.value.isRepresentingMyself 
    ? 'myself' 
    : formData.value.representing;
    
  let message = `Hello! I'm coming from your site!\nI'm ${formData.value.name}, representing ${representingText} and I'm here to chat with you regarding:\n${formData.value.topic}`;
  
  if (formData.value.email) {
    message += `\n\n(optional) you can also email me at: ${formData.value.email}`;
  }
  
  return message;
});

const whatsappUrl = computed(() => {
  const phoneNumber = '6287888889990';
  const encodedMessage = encodeURIComponent(whatsappMessage.value);
  return `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
});

const sendWhatsAppMessage = () => {
  if (validateForm()) {
    window.open(whatsappUrl.value, '_blank');
  }
};

const toggleRepresentingMyself = () => {
  formData.value.isRepresentingMyself = !formData.value.isRepresentingMyself;
  if (formData.value.isRepresentingMyself) {
    formData.value.representing = '';
    delete errors.value.representing;
  }
};
</script>

<template>
  <div class="whatsapp-contact-form">
    <div class="form-header">
      <h2 class="form-title">Let's Connect on WhatsApp</h2>
      <p class="form-subtitle">Fill out the form below and I'll get your message instantly</p>
    </div>
    
    <form @submit.prevent="sendWhatsAppMessage" class="contact-form">
      <!-- Name Field -->
      <div class="form-group">
        <label for="name" class="form-label">Your Name *</label>
        <input
          id="name"
          v-model="formData.name"
          type="text"
          class="form-input"
          :class="{ 'form-input--error': errors.name }"
          placeholder="Enter your name"
          maxlength="50"
        />
        <span v-if="errors.name" class="form-error">{{ errors.name }}</span>
      </div>

      <!-- Representing Field -->
      <div class="form-group">
        <label class="form-label">Representing *</label>
        <div class="representing-section">
          <div class="checkbox-wrapper">
            <input
              id="representing-myself"
              type="checkbox"
              :checked="formData.isRepresentingMyself"
              @change="toggleRepresentingMyself"
              class="form-checkbox"
            />
            <label for="representing-myself" class="checkbox-label">Myself</label>
          </div>
          
          <div class="or-divider">
            <span>OR</span>
          </div>
          
          <input
            v-model="formData.representing"
            type="text"
            class="form-input"
            :class="{ 'form-input--error': errors.representing }"
            :disabled="formData.isRepresentingMyself"
            placeholder="Company/Organization name"
            maxlength="100"
          />
        </div>
        <span v-if="errors.representing" class="form-error">{{ errors.representing }}</span>
      </div>

      <!-- Topic Field -->
      <div class="form-group">
        <label for="topic" class="form-label">What would you like to discuss? *</label>
        <textarea
          id="topic"
          v-model="formData.topic"
          class="form-textarea"
          :class="{ 'form-textarea--error': errors.topic }"
          placeholder="Tell me what you'd like to chat about..."
          rows="4"
          maxlength="500"
        ></textarea>
        <div class="character-count">{{ formData.topic.length }}/500</div>
        <span v-if="errors.topic" class="form-error">{{ errors.topic }}</span>
      </div>

      <!-- Email Field (Optional) -->
      <div class="form-group">
        <label for="email" class="form-label">Email (Optional)</label>
        <input
          id="email"
          v-model="formData.email"
          type="email"
          class="form-input"
          :class="{ 'form-input--error': errors.email }"
          placeholder="your.email@example.com"
          maxlength="100"
        />
        <span v-if="errors.email" class="form-error">{{ errors.email }}</span>
      </div>

      <!-- Preview Section -->
      <div class="message-preview">
        <h3 class="preview-title">Message Preview:</h3>
        <div class="preview-content">
          <pre>{{ whatsappMessage }}</pre>
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="whatsapp-submit-btn">
        <svg class="whatsapp-icon" viewBox="0 0 24 24" fill="currentColor">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.687"/>
        </svg>
        Send WhatsApp Message
      </button>
    </form>
  </div>
</template>

<style scoped>
.whatsapp-contact-form {
  max-width: 600px;
  margin: 0 auto;
  padding: var(--space-8);
  background: var(--color-dark-gray-i);
  border-radius: var(--radius-lg);
  border: 1px solid var(--color-gray-i);
}

.form-header {
  text-align: center;
  margin-bottom: var(--space-8);
}

.form-title {
  font-family: var(--font-family-heading-2);
  font-size: var(--font-size-2xl);
  color: var(--color-light-green-i);
  margin-bottom: var(--space-2);
}

.form-subtitle {
  color: var(--color-light-gray-i);
  font-size: var(--font-size-sm);
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: var(--space-6);
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: var(--space-2);
}

.form-label {
  font-weight: 500;
  color: var(--color-light-gray-ii);
  font-size: var(--font-size-sm);
}

.form-input,
.form-textarea {
  padding: var(--space-3) var(--space-4);
  background: var(--color-main-gray);
  border: 1px solid var(--color-gray-i);
  border-radius: var(--radius-md);
  color: var(--color-light-gray-iii);
  font-size: var(--font-size-base);
  transition: all var(--transition-fast);
}

.form-input:focus,
.form-textarea:focus {
  outline: none;
  border-color: var(--color-light-green-i);
  box-shadow: 0 0 0 2px rgba(199, 248, 203, 0.1);
}

.form-input:disabled {
  opacity: 0.5;
  cursor: not-allowed;
  background: var(--color-gray-i);
}

.form-input--error,
.form-textarea--error {
  border-color: var(--color-red-i);
}

.form-textarea {
  resize: vertical;
  min-height: 100px;
  font-family: inherit;
}

.representing-section {
  display: flex;
  flex-direction: column;
  gap: var(--space-3);
}

.checkbox-wrapper {
  display: flex;
  align-items: center;
  gap: var(--space-2);
}

.form-checkbox {
  width: 18px;
  height: 18px;
  accent-color: var(--color-light-green-i);
}

.checkbox-label {
  color: var(--color-light-gray-ii);
  font-size: var(--font-size-sm);
  cursor: pointer;
}

.or-divider {
  text-align: center;
  color: var(--color-gray-i);
  font-size: var(--font-size-xs);
  position: relative;
}

.or-divider::before,
.or-divider::after {
  content: '';
  position: absolute;
  top: 50%;
  width: 40%;
  height: 1px;
  background: var(--color-gray-i);
}

.or-divider::before {
  left: 0;
}

.or-divider::after {
  right: 0;
}

.character-count {
  font-size: var(--font-size-xs);
  color: var(--color-gray-i);
  text-align: right;
}

.form-error {
  color: var(--color-red-i);
  font-size: var(--font-size-xs);
}

.message-preview {
  background: var(--color-main-gray);
  border: 1px solid var(--color-gray-i);
  border-radius: var(--radius-md);
  padding: var(--space-4);
}

.preview-title {
  font-size: var(--font-size-sm);
  color: var(--color-light-gray-ii);
  margin-bottom: var(--space-2);
}

.preview-content {
  background: var(--color-dark-gray-i);
  padding: var(--space-3);
  border-radius: var(--radius-sm);
  border-left: 3px solid var(--color-light-green-i);
}

.preview-content pre {
  color: var(--color-light-gray-iii);
  font-size: var(--font-size-sm);
  white-space: pre-wrap;
  word-wrap: break-word;
  margin: 0;
  font-family: inherit;
}

.whatsapp-submit-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-2);
  padding: var(--space-4) var(--space-6);
  background: #25D366;
  color: white;
  border: none;
  border-radius: var(--radius-md);
  font-size: var(--font-size-base);
  font-weight: 600;
  cursor: pointer;
  transition: all var(--transition-fast);
}

.whatsapp-submit-btn:hover {
  background: #22c55e;
  transform: translateY(-1px);
}

.whatsapp-submit-btn:active {
  transform: translateY(0);
}

.whatsapp-icon {
  width: 20px;
  height: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
  .whatsapp-contact-form {
    padding: var(--space-6);
    margin: var(--space-4);
  }
  
  .form-title {
    font-size: var(--font-size-xl);
  }
  
  .representing-section {
    gap: var(--space-2);
  }
}

@media (max-width: 480px) {
  .whatsapp-contact-form {
    padding: var(--space-4);
    margin: var(--space-2);
  }
  
  .contact-form {
    gap: var(--space-4);
  }
}
</style>
