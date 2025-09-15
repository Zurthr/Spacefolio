<script setup lang="ts">
const openWhatsAppDirect = () => {
  const phoneNumber = '6287888889990';
  const message = "Hello! I'm coming from Zurufikar.dev!";
  const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
  window.open(url, '_blank');
};
</script>

<template>
  <div>
    <div class="whatsapp-contact-form">
      <div 
        @click="openWhatsAppDirect" 
        class="form-trigger"
      >
        <div class="trigger-content">
          <div class="whatsapp-contact-box">
              <h4 class="trigger-title">Chat with me on Whatsapp!</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.whatsapp-contact-form {
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
  transition: all var(--transition-normal);
}

/* Collapsed State Styles - Match email contact styling */
.form-trigger {
  background: transparent;
  padding: 0;
  cursor: pointer;
  border: none;
  border-radius: 0;
}

.trigger-content {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  gap: 8px;
}

.trigger-title {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 20px;
  color: white;
  margin: 0;
  line-height: 1.2;
}

.whatsapp-icon-trigger {
  width: 24px;
  height: 24px;
  color: #25D366;
  flex-shrink: 0;
}

.whatsapp-contact-box {
  display: flex;
  align-items: center;
  padding: 4px 8px;
  border-radius: 4px;
  border: 2px dashed white;
  width: fit-content;
  transition: all 0.5s ease;
}

.whatsapp-contact-box h2 {
  font-size: 20px;
  margin: 0;
  color: white;
}

.whatsapp-contact-box:hover {
  transform: scale(1.05);
  transition: all 0.5s ease;
  border: 2px solid white;
}

/* Modal Styles */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
  animation: fadeInModal 0.3s ease-out;
}

.modal-content {
  background: var(--color-dark-gray-i);
  border-radius: var(--radius-lg);
  border: 1px solid var(--color-gray-i);
  padding: var(--space-8);
  width: 90%;
  max-width: 500px;
  max-height: 80vh;
  overflow-y: auto;
  animation: slideInModal 0.3s ease-out;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: var(--space-4);
}

.modal-title {
  font-family: var(--font-family-heading-2);
  font-size: var(--font-size-2xl);
  color: var(--color-light-green-i);
  margin: 0;
}

.modal-close-btn {
  background: none;
  border: none;
  color: var(--color-light-gray-i);
  cursor: pointer;
  padding: var(--space-2);
  border-radius: var(--radius-sm);
  transition: all var(--transition-fast);
  width: 32px;
  height: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.modal-close-btn svg {
  width: 20px;
  height: 20px;
}

.modal-close-btn:hover {
  background: var(--color-main-gray);
  color: var(--color-light-gray-ii);
}

.modal-subtitle {
  color: var(--color-light-gray-i);
  font-size: var(--font-size-sm);
  margin-bottom: var(--space-6);
  text-align: center;
}

@keyframes fadeInModal {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes slideInModal {
  from {
    opacity: 0;
    transform: translateY(-20px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 4px;
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
  .modal-content {
    width: 95%;
    max-width: none;
    padding: var(--space-6);
  }
  
  .modal-title {
    font-size: var(--font-size-xl);
  }
  
  .trigger-title {
    font-size: 18px;
  }

  .whatsapp-icon-trigger {
    width: 20px;
    height: 20px;
  }
}

@media (max-width: 480px) {
  .modal-content {
    width: 98%;
    padding: var(--space-4);
    max-height: 90vh;
  }

  .modal-title {
    font-size: var(--font-size-lg);
  }

  .trigger-title {
    font-size: 16px;
  }

  .whatsapp-contact-box h2 {
    font-size: 18px;
  }
  
  .contact-form {
    gap: var(--space-4);
  }
}
</style>
