import { SweetAlertComponent } from "../../components/scripts/sweetAlert";

export default function LoadSuccessMessages() {

    const messages = document.querySelector('meta[name="success-messages"]');
    if (messages == null) return;
    const successMessages = JSON.parse(messages.content);
    messages?.remove();
    SweetAlertComponent().basic.success("Sucesso", Array.isArray(successMessages) ? successMessages.join('<br>') : successMessages);

}

