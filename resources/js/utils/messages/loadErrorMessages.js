import { SweetAlertComponent } from "../../components/scripts/sweetAlert";

export default function LoadErrorMessages() {

    const messages = document.querySelector('meta[name="error-messages"]');
    if (messages == null) return;
    messages?.remove();

    const errorMessages = JSON.parse(messages.content);

    SweetAlertComponent().basic.error("Erro", Array.isArray(errorMessages) ? errorMessages.join('<br>') : errorMessages);
}

