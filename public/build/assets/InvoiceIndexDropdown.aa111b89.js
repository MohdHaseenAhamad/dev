import{P as M,Q as U,u as F,R as j,I as q,e as H,x as W,f as J,F as Q,r as k,o as r,n as l,w as a,m as c,a as i,J as y,S as b,T as N,q as d,t as v,U as m}from"./main.d0ffa6eb.js";const K={props:{row:{type:Object,default:null},table:{type:Object,default:null},loadData:{type:Function,default:()=>{}}},setup(o){const I=o,E=M(),x=U(),T=F(),p=j(),g=q(),{t:s}=H(),f=W(),C=J(),A=Q("utils");function B(e){return(e.status=="SENT"||e.status=="VIEWED")&&f.name!=="invoices.view"&&g.hasAbilities(y.SEND_INVOICE)}function V(e){C.push(`/admin/credit-note/${e.id}/create`)}function S(e){return(e.status=="DRAFT"||e.status=="OVERDUE")&&f.name!=="invoices.view"&&g.hasAbilities(y.SEND_INVOICE)}function O(e){return e.status!="ACCEPTED"&&g.hasAbilities(y.EDIT_INVOICE)}async function _(e){p.openDialog({title:s("general.are_you_sure"),message:s("invoices.confirm_delete"),yesLabel:s("general.ok"),noLabel:s("general.cancel"),variant:"danger",hideNoButton:!1,size:"lg"}).then(t=>{e=e,t&&E.deleteInvoice({ids:[e]}).then(n=>{n.data.success&&(C.push("/admin/invoices"),I.table&&I.table.refresh(),E.$patch(w=>{w.selectedInvoices=[],w.selectAllField=!1}))})})}async function L(e){p.openDialog({title:s("general.are_you_sure"),message:s("invoices.confirm_clone"),yesLabel:s("general.ok"),noLabel:s("general.cancel"),variant:"primary",hideNoButton:!1,size:"lg"}).then(t=>{t&&E.cloneInvoice(e).then(n=>{C.push(`/admin/invoices/${n.data.data.id}/edit`)})})}async function P(e){p.openDialog({title:s("general.are_you_sure"),message:s("invoices.invoice_mark_as_sent"),yesLabel:s("general.ok"),noLabel:s("general.cancel"),variant:"primary",hideNoButton:!1,size:"lg"}).then(t=>{const n={id:e,status:"SENT",is_edit:"0"};t&&E.markAsSent(n).then(w=>{I.table&&I.table.refresh()})})}async function $(e){x.openModal({title:s("invoices.send_invoice"),componentName:"SendInvoiceModal",id:e.id,data:e,variant:"sm"})}function R(){let e=`${window.location.origin}/invoices/pdf/${I.row.unique_hash}`;A.copyTextToClipboard(e),T.showNotification({type:"success",message:s("general.copied_pdf_url_clipboard")})}return(e,t)=>{const n=k("BaseIcon"),w=k("BaseButton"),u=k("BaseDropdownItem"),D=k("router-link"),z=k("BaseDropdown");return r(),l(z,{class:"z-20"},{activator:a(()=>[c(f).name==="invoices.view"?(r(),l(w,{key:0,variant:"primary"},{default:a(()=>[i(n,{name:"DotsHorizontalIcon",class:"h-5 text-white"})]),_:1})):(r(),l(n,{key:1,name:"DotsHorizontalIcon",class:"h-5 text-gray-500"}))]),default:a(()=>[c(g).hasAbilities(c(y).EDIT_INVOICE)?(r(),l(D,{key:0,to:`/admin/invoices/${o.row.id}/edit`},{default:a(()=>[b(i(u,null,{default:a(()=>[i(n,{name:"PencilIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("general.edit")),1)]),_:1},512),[[N,O(o.row)]])]),_:1},8,["to"])):m("",!0),c(f).name==="invoices.view"?(r(),l(u,{key:1,onClick:R},{default:a(()=>[i(n,{name:"LinkIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("general.copy_pdf_url")),1)]),_:1})):m("",!0),c(f).name!=="invoices.view"&&c(g).hasAbilities(c(y).VIEW_INVOICE)?(r(),l(D,{key:2,to:`/admin/invoices/${o.row.id}/view`},{default:a(()=>[i(u,null,{default:a(()=>[i(n,{name:"EyeIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("general.view")),1)]),_:1})]),_:1},8,["to"])):m("",!0),S(o.row)?(r(),l(u,{key:3,onClick:t[0]||(t[0]=h=>$(o.row))},{default:a(()=>[i(n,{name:"PaperAirplaneIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("invoices.send_invoice")),1)]),_:1})):m("",!0),B(o.row)?(r(),l(u,{key:4,onClick:t[1]||(t[1]=h=>$(o.row))},{default:a(()=>[i(n,{name:"PaperAirplaneIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("invoices.resend_invoice")),1)]),_:1})):m("",!0),i(D,{to:`/admin/payments/${o.row.id}/create`},{default:a(()=>[o.row.status=="SENT"&&c(f).name!=="invoices.view"?(r(),l(u,{key:0},{default:a(()=>[i(n,{name:"CreditCardIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("invoices.record_payment")),1)]),_:1})):m("",!0)]),_:1},8,["to"]),S(o.row)?(r(),l(u,{key:5,onClick:t[2]||(t[2]=h=>P(o.row.id))},{default:a(()=>[i(n,{name:"CheckCircleIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("invoices.mark_as_sent")),1)]),_:1})):m("",!0),c(g).hasAbilities(c(y).CREATE_INVOICE)?(r(),l(u,{key:6,onClick:t[3]||(t[3]=h=>L(o.row))},{default:a(()=>[i(n,{name:"DocumentTextIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("invoices.clone_invoice")),1)]),_:1})):m("",!0),b(i(u,{onClick:t[4]||(t[4]=h=>V(o.row))},{default:a(()=>[i(n,{name:"PlusIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("creditnote.create")),1)]),_:1},512),[[N,o.row.status=="SENT"||o.row.status=="COMPLETED"]]),c(g).hasAbilities(c(y).DELETE_INVOICE)?(r(),l(u,{key:7,onClick:t[5]||(t[5]=h=>_(o.row.id))},{default:a(()=>[i(n,{name:"TrashIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),d(" "+v(e.$t("general.delete")),1)]),_:1})):m("",!0)]),_:1})}}};export{K as _};