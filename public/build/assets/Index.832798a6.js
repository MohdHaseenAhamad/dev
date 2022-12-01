import{ar as be,R as ge,u as ve,H as Be,e as ye,F as he,g,f as ke,I as Ie,y as Ce,l as F,Y as Ee,Z as De,r as n,o as v,n as B,w as o,a,S as $,T as P,m as l,E as k,q as f,t as i,J as b,U as w,b as p,L as W,p as $e}from"./main.d0ffa6eb.js";import{M as Pe}from"./MoonwalkerIcon.ec6772d4.js";import{_ as Ve,a as Te}from"./SendProformaModal.4c1f0c1c.js";const Ae=p("div",{class:"hidden w-8 h-0 mx-4 border border-gray-400 border-solid xl:block",style:{"margin-top":"1.5rem"}},null,-1),Se={class:"pt-6"},Fe={class:"flex"},we={class:"relative table-container"},Ne={class:"relative flex items-center justify-between h-10 mt-5 list-none border-b-2 border-gray-200 border-solid"},Ue={class:"flex text-sm font-medium cursor-pointer select-none text-primary-400"},Re={class:"absolute items-center left-6 top-2.5 select-none"},Le={class:"relative block"},Oe={class:"flex justify-between"},He={setup(Me){const d=be(),G=ge();ve();const H=Be(),{t:r}=ye();he("$utils");const I=g(null),y=g(!1),j=g([{label:"Status",options:["ALL","DRAFT","DUE","SENT","VIEWED","OVERDUE","COMPLETED"]},{label:"Paid Status",options:["UNPAID","PAID","PARTIALLY_PAID"]},,]),N=g(!0),U=g(!0),m=g("general.draft");ke();const C=Ie();let s=Ce({customer_id:"",status:"DRAFT",from_date:"",to_date:"",proforma_number:""});const R=F(()=>!d.proformaTotalCount&&!N.value),V=F({get:()=>d.selectedProformas,set:t=>d.selectProforma(t)}),Y=F(()=>[{key:"checkbox",thClass:"extra w-10",tdClass:"font-medium text-gray-900",placeholderClass:"w-10",sortable:!1},{key:"proforma_date",label:r("proformas.date"),thClass:"extra",tdClass:"font-medium"},{key:"proforma_number",label:r("proformas.number")},{key:"name",label:r("proformas.customer")},{key:"status",label:r("proformas.status")},{key:"due_amount",label:r("dashboard.recent_invoices_card.amount_due")},{key:"total",label:r("proformas.total"),tdClass:"font-medium text-gray-900"},{key:"actions",label:r("proformas.action"),tdClass:"text-right text-sm font-medium",thClass:"text-right",sortable:!1}]);Ee(s,()=>{Z()},{debounce:500}),De(()=>{d.selectAllField&&d.selectAllProformas()});function q(){return C.hasAbilities([b.DELETE_INVOICE,b.EDIT_INVOICE,b.VIEW_INVOICE,b.SEND_INVOICE])}async function z(t,u){s.status="",T()}function T(){I.value&&I.value.refresh()}async function J({page:t,filter:u,sort:_}){let A={customer_id:s.customer_id,status:s.status,from_date:s.from_date,to_date:s.to_date,proforma_number:s.proforma_number,orderByField:_.fieldName||"created_at",orderBy:_.order||"desc",page:t};N.value=!0;let c=await d.fetchProformas(A);return U.value=c.data.data.length>0,{data:c.data.data,pagination:{totalPages:c.data.meta.last_page,currentPage:t,totalCount:c.data.meta.total,limit:10}}}function X(t){if(m.value==t.title)return!0;switch(m.value=t.title,t.title){case r("general.draft"):s.status="DRAFT";break;case r("general.sent"):s.status="SENT";break;case r("general.due"):s.status="DUE";break;default:s.status="";break}}function Z(){d.$patch(t=>{t.selectedProformas=[],t.selectAllField=!1}),T()}function L(){s.customer_id="",s.status="",s.from_date="",s.to_date="",s.proforma_number="",m.value=r("general.all")}async function K(){G.openDialog({title:r("general.are_you_sure"),message:r("proformas.confirm_delete"),yesLabel:r("general.ok"),noLabel:r("general.cancel"),variant:"danger",hideNoButton:!1,size:"lg"}).then(async t=>{t&&await d.deleteMultipleProformas().then(u=>{u.data.success&&(T(),d.$patch(_=>{_.selectedProformas=[],_.selectAllField=!1}))})})}function Q(){y.value&&L(),y.value=!y.value}function ee(t){switch(t){case"DRAFT":m.value=r("general.draft");break;case"ALL":m.value=r("general.all");break;case"SENT":m.value=r("general.sent");break;case"DUE":m.value=r("general.due");break;case"COMPLETED":m.value=r("proformas.completed");break;case"PAID":m.value=r("proformas.paid");break;case"UNPAID":m.value=r("proformas.unpaid");break;case"PARTIALLY_PAID":m.value=r("proformas.partially_paid");break;case"VIEWED":m.value=r("proformas.viewed");break;case"OVERDUE":m.value=r("proformas.overdue");break;default:m.value=r("general.all");break}}return(t,u)=>{const _=n("BaseBreadcrumbItem"),A=n("BaseBreadcrumb"),c=n("BaseIcon"),E=n("BaseButton"),S=n("router-link"),ae=n("BasePageHeader"),te=n("BaseCustomerSelectInput"),h=n("BaseInputGroup"),oe=n("BaseMultiselect"),O=n("BaseDatePicker"),le=n("BaseInput"),se=n("BaseFilterWrapper"),re=n("BaseEmptyPlaceholder"),D=n("BaseTab"),ne=n("BaseTabGroup"),ue=n("BaseDropdownItem"),de=n("BaseDropdown"),M=n("BaseCheckbox"),me=n("BaseText"),x=n("BaseFormatMoney"),ce=n("BaseProformaStatusBadge"),ie=n("BasePaidStatusBadge"),fe=n("BaseTable"),pe=n("BasePage");return v(),B(pe,null,{default:o(()=>[a(Ve),a(ae,{title:t.$t("proformas.title")},{actions:o(()=>[$(a(E,{variant:"primary-outline",onClick:Q},{right:o(e=>[y.value?(v(),B(c,{key:1,name:"XIcon",class:k(e.class)},null,8,["class"])):(v(),B(c,{key:0,name:"FilterIcon",class:k(e.class)},null,8,["class"]))]),default:o(()=>[f(i(t.$t("general.filter"))+" ",1)]),_:1},512),[[P,l(d).proformaTotalCount]]),l(C).hasAbilities(l(b).CREATE_INVOICE)?(v(),B(S,{key:0,to:"proformas/create"},{default:o(()=>[a(E,{variant:"primary",class:"ml-4"},{left:o(e=>[a(c,{name:"PlusIcon",class:k(e.class)},null,8,["class"])]),default:o(()=>[f(" "+i(t.$t("proformas.new_proforma")),1)]),_:1})]),_:1})):w("",!0)]),default:o(()=>[a(A,null,{default:o(()=>[a(_,{title:t.$t("general.home"),to:"dashboard"},null,8,["title"]),a(_,{title:t.$tc("proformas.proforma",2),to:"#",active:""},null,8,["title"])]),_:1})]),_:1},8,["title"]),$(a(se,{"row-on-xl":!0,onClear:L},{default:o(()=>[a(h,{label:t.$tc("customers.customer",1)},{default:o(()=>[a(te,{modelValue:l(s).customer_id,"onUpdate:modelValue":u[0]||(u[0]=e=>l(s).customer_id=e),placeholder:t.$t("customers.type_or_click"),"value-prop":"id",label:"name"},null,8,["modelValue","placeholder"])]),_:1},8,["label"]),a(h,{label:t.$t("proformas.status")},{default:o(()=>[a(oe,{modelValue:l(s).status,"onUpdate:modelValue":[u[1]||(u[1]=e=>l(s).status=e),ee],groups:!0,options:j.value,searchable:"",placeholder:t.$t("general.select_a_status"),onRemove:u[2]||(u[2]=e=>z())},null,8,["modelValue","options","placeholder"])]),_:1},8,["label"]),a(h,{label:t.$t("general.from")},{default:o(()=>[a(O,{modelValue:l(s).from_date,"onUpdate:modelValue":u[3]||(u[3]=e=>l(s).from_date=e),"calendar-button":!0,"calendar-button-icon":"calendar"},null,8,["modelValue"])]),_:1},8,["label"]),Ae,a(h,{label:t.$t("general.to"),class:"mt-2"},{default:o(()=>[a(O,{modelValue:l(s).to_date,"onUpdate:modelValue":u[4]||(u[4]=e=>l(s).to_date=e),"calendar-button":!0,"calendar-button-icon":"calendar"},null,8,["modelValue"])]),_:1},8,["label"]),a(h,{label:t.$t("proformas.proforma_number")},{default:o(()=>[a(le,{modelValue:l(s).proforma_number,"onUpdate:modelValue":u[5]||(u[5]=e=>l(s).proforma_number=e)},{left:o(e=>[a(c,{name:"HashtagIcon",class:k(e.class)},null,8,["class"])]),_:1},8,["modelValue"])]),_:1},8,["label"]),p("div",Se,[U.value?(v(),B(S,{key:0,to:`/filtered-proformas-list?selectedCompany=${l(H).selectedCompany.id}&$customer_id=${l(s).customer_id}&status=${l(s).status}&from_date=${l(s).from_date}&to_date=${l(s).to_date}&proforma_number=${l(s).proforma_number}`,target:"_blank"},{default:o(()=>[a(E,{class:"mr-3",variant:"primary-outline",type:"button"},{default:o(()=>[p("span",Fe,i(t.$t("Download")),1)]),_:1})]),_:1},8,["to"])):w("",!0)])]),_:1},512),[[P,y.value]]),$(a(re,{title:t.$t("proformas.no_proformas"),description:t.$t("proformas.list_of_proformas")},W({default:o(()=>[a(Pe,{class:"mt-5 mb-4"})]),_:2},[l(C).hasAbilities(l(b).CREATE_INVOICE)?{name:"actions",fn:o(()=>[a(E,{variant:"primary-outline",onClick:u[6]||(u[6]=e=>t.$router.push("/admin/proformas/create"))},{left:o(e=>[a(c,{name:"PlusIcon",class:k(e.class)},null,8,["class"])]),default:o(()=>[f(" "+i(t.$t("proformas.add_new_proforma")),1)]),_:1})])}:void 0]),1032,["title","description"]),[[P,l(R)]]),$(p("div",we,[p("div",Ne,[a(ne,{class:"-mb-5",onChange:X},{default:o(()=>[a(D,{title:t.$t("general.draft"),filter:"DRAFT"},null,8,["title"]),a(D,{title:t.$t("general.due"),filter:"DUE"},null,8,["title"]),a(D,{title:t.$t("general.sent"),filter:"SENT"},null,8,["title"]),a(D,{title:t.$t("general.all"),filter:""},null,8,["title"])]),_:1}),l(d).selectedProformas.length&&l(C).hasAbilities(l(b).DELETE_INVOICE)?(v(),B(de,{key:0,class:"absolute float-right"},{activator:o(()=>[p("span",Ue,[f(i(t.$t("general.actions"))+" ",1),a(c,{name:"ChevronDownIcon"})])]),default:o(()=>[a(ue,{onClick:K},{default:o(()=>[a(c,{name:"TrashIcon",class:"mr-3 text-gray-600"}),f(" "+i(t.$t("general.delete")),1)]),_:1})]),_:1})):w("",!0)]),a(fe,{ref_key:"table",ref:I,data:J,columns:l(Y),"placeholder-count":l(d).proformaTotalCount>=20?10:5,class:"mt-10"},W({header:o(()=>[p("div",Re,[a(M,{modelValue:l(d).selectAllField,"onUpdate:modelValue":u[7]||(u[7]=e=>l(d).selectAllField=e),variant:"primary",onChange:l(d).selectAllProformas},null,8,["modelValue","onChange"])])]),"cell-checkbox":o(({row:e})=>[p("div",Le,[a(M,{id:e.id,modelValue:l(V),"onUpdate:modelValue":u[8]||(u[8]=_e=>$e(V)?V.value=_e:null),value:e.data.id},null,8,["id","modelValue","value"])])]),"cell-name":o(({row:e})=>[a(me,{text:e.data.customer.name,length:30},null,8,["text"])]),"cell-proforma_number":o(({row:e})=>[a(S,{to:{path:`proformas/${e.data.id}/view`},class:"font-medium text-primary-500"},{default:o(()=>[f(i(e.data.proforma_number),1)]),_:2},1032,["to"])]),"cell-proforma_date":o(({row:e})=>[f(i(e.data.formatted_proforma_date),1)]),"cell-total":o(({row:e})=>[a(x,{amount:e.data.total,currency:e.data.customer.currency},null,8,["amount","currency"])]),"cell-status":o(({row:e})=>[a(ce,{status:e.data.status,class:"px-3 py-1"},{default:o(()=>[f(i(e.data.status),1)]),_:2},1032,["status"])]),"cell-due_amount":o(({row:e})=>[p("div",Oe,[a(x,{amount:e.data.due_amount,currency:e.data.currency},null,8,["amount","currency"]),a(ie,{status:e.data.paid_status,class:"px-1 py-0.5 ml-2"},{default:o(()=>[f(i(e.data.paid_status),1)]),_:2},1032,["status"])])]),_:2},[q()?{name:"cell-actions",fn:o(({row:e})=>[a(Te,{row:e.data,table:I.value},null,8,["row","table"])])}:void 0]),1032,["columns","placeholder-count"])],512),[[P,!l(R)]])]),_:1})}}};export{He as default};