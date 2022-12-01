import{x as O,f as R,am as K,u as Q,X,a1 as z,H as J,Q as W,P as Y,a2 as Z,F as ee,e as te,g as B,y as ae,l as v,h as w,i as q,k as ne,O as oe,aK as re,r as i,o as ue,c as ie,a as n,w as s,b as P,m as a,t as f,q as V,s as se,aa as ce}from"./main.d0ffa6eb.js";/* empty css                                                  *//* empty css                                                                      */import{_ as le}from"./PaymentModeModal.72b41f55.js";const me=["onSubmit"],de=P("h3",null,"Please select customer and invoice to generate credit note",-1),ye=P("br",null,null,-1),pe=P("br",null,null,-1),_e={class:"absolute left-3.5"},he={setup(ve){const u=O(),M=R(),e=K();Q();const N=X();z(),J(),W();const S=Y();Z();const $=ee("utils"),{t:g}=te();let C=B(!1),b=B(!1),l=B([]);const h=B(null),E="newEstimate";ae(["customer","company","customerCustom","payment","paymentCustom"]),v({get:()=>e.currentPayment.amount/100,set:t=>{e.currentPayment.amount=Math.round(t*100)}});const p=v(()=>e.isFetchingInitialData),m=v(()=>u.name==="payments.edit");v(()=>m.value?g("payments.edit_payment"):g("payments.new_payment"));const D=v(()=>({currentPayment:{customer_id:{required:w.withMessage(g("validation.required"),q)},invoice_id:{required:w.withMessage(g("validation.required"),q)}}})),_=ne(D,e,{$scope:E});oe(()=>{e.currentPayment.customer_id&&L(e.currentPayment.customer_id),u.query.customer&&(e.currentPayment.customer_id=u.query.customer)}),e.resetCurrentPayment(),u.query.customer&&(e.currentPayment.customer_id=u.query.customer),e.fetchPaymentInitialData(m.value),u.params.id&&!m.value&&F();async function F(){let t=await S.fetchInvoice(u?.params?.id);e.currentPayment.customer_id=t.data.data.customer.id,e.currentPayment.invoice_id=t.data.data.id}async function k(t){}function L(t){if(t){let o={customer_id:t,doublestatus:"SENTCOMPLETE",limit:"all"};m.value&&(o.status=""),b.value=!0,Promise.all([S.fetchInvoices(o,!0),N.fetchCustomer(t)]).then(async([c,d])=>{c&&(l.value=[...c.data.data]),d&&d.data&&(e.currentPayment.selectedCustomer=d.data.data,e.currentPayment.customer=d.data.data,e.currentPayment.currency=d.data.data.currency),m.value&&e.currentPayment.invoice_id&&(h.value=l.value.find(y=>y.id===e.currentPayment.invoice_id),e.currentPayment.maxPayableAmount=h.value.due_amount+e.currentPayment.amount),m.value&&(l.value=l.value.filter(y=>y.due_amount>0||y.id==e.currentPayment.invoice_id)),b.value=!1}).catch(c=>{b.value=!1,console.error(c,"error")})}}re(()=>{e.resetCurrentPayment(),l.value=[]});async function U(){if(_.value.$touch(),_.value.$invalid)return!1;C.value=!0,M.push(`/admin/credit-note/${e.currentPayment.invoice_id}/create`)}function A(t){let o={userId:t};u.params.id&&(o.model_id=u.params.id),e.currentPayment.invoice_id=h.value=null,e.currentPayment.amount=100,l.value=[],e.getNextNumber(o,!0)}return(t,o)=>{const c=i("BaseBreadcrumbItem"),d=i("BaseBreadcrumb"),y=i("BasePageHeader"),G=i("BaseCustomerSelectInput"),I=i("BaseInputGroup"),H=i("BaseMultiselect"),T=i("BaseButton"),j=i("BaseCard"),x=i("BasePage");return ue(),ie(ce,null,[n(le),n(x,{class:"relative payment-create"},{default:s(()=>[P("form",{action:"",onSubmit:se(U,["prevent"])},[n(y,{title:t.$t("creditnote.title")},{default:s(()=>[n(d,null,{default:s(()=>[n(c,{title:t.$t("general.home"),to:"/admin/dashboard"},null,8,["title"]),n(c,{title:t.$t("creditnote.title"),to:"/admin/credit-note"},null,8,["title"]),n(c,{title:t.$t("creditnote.new"),to:"#",active:""},null,8,["title"])]),_:1})]),_:1},8,["title"]),n(j,null,{default:s(()=>[de,ye,n(I,{label:t.$t("payments.customer"),error:a(_).currentPayment.customer_id.$error&&a(_).currentPayment.customer_id.$errors[0].$message,"content-loading":a(p),required:""},{default:s(()=>[n(G,{modelValue:a(e).currentPayment.customer_id,"onUpdate:modelValue":[o[0]||(o[0]=r=>a(e).currentPayment.customer_id=r),o[1]||(o[1]=r=>A(a(e).currentPayment.customer_id))],"content-loading":a(p),invalid:a(_).currentPayment.customer_id.$error,placeholder:t.$t("customers.select_a_customer"),"fetch-all":a(m),"show-action":""},null,8,["modelValue","content-loading","invalid","placeholder","fetch-all"])]),_:1},8,["label","error","content-loading"]),pe,n(I,{"content-loading":a(p),label:t.$t("payments.invoice"),"help-text":h.value?`Due Amount: ${a(e).currentPayment.maxPayableAmount/100}`:""},{default:s(()=>[n(H,{modelValue:a(e).currentPayment.invoice_id,"onUpdate:modelValue":o[2]||(o[2]=r=>a(e).currentPayment.invoice_id=r),"content-loading":a(p),"value-prop":"id","track-by":"invoice_number",label:"invoice_number",options:a(l),loading:a(b),placeholder:t.$t("invoices.select_invoice"),onSelect:k},{singlelabel:s(({value:r})=>[P("div",_e,f(r.invoice_number)+" ("+f(a($).formatMoney(r.total,r.customer.currency))+") ",1)]),option:s(({option:r})=>[V(f(r.invoice_number)+" ("+f(a($).formatMoney(r.total,r.customer.currency))+") ",1)]),_:1},8,["modelValue","content-loading","options","loading","placeholder"])]),_:1},8,["content-loading","label","help-text"]),n(T,{loading:a(C),"content-loading":a(p),variant:"primary",type:"submit",class:"flex justify-center mt-4"},{default:s(()=>[V(f(t.$t("creditnote.proceed")),1)]),_:1},8,["loading","content-loading"])]),_:1})],40,me)]),_:1})],64)}}};export{he as default};