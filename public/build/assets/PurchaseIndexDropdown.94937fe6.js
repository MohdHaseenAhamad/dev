import{al as S,Q as x,u as C,R as N,I as V,e as T,x as $,f as A,F as O,r as i,o as s,n,w as t,m as a,a as r,J as m,S as P,T as j,q as f,t as g,U as I}from"./main.d0ffa6eb.js";const L={props:{row:{type:Object,default:null},table:{type:Object,default:null},loadData:{type:Function,default:()=>{}}},setup(l){const w=l,y=S();x(),C();const D=N(),c=V(),{t:u}=T(),v=$(),E=A();O("utils");function B(e){return e.status!="ACCEPTED"&&c.hasAbilities(m.EDIT_INVOICE)}async function b(e){D.openDialog({title:u("general.are_you_sure"),message:u("purchases.confirm_delete"),yesLabel:u("general.ok"),noLabel:u("general.cancel"),variant:"danger",hideNoButton:!1,size:"lg"}).then(d=>{e=e,d&&y.deletePurchase({ids:[e]}).then(o=>{o.data.success&&(E.push("/admin/purchases"),w.table&&w.table.refresh(),y.$patch(h=>{h.selectedPurchases=[],h.selectAllField=!1}))})})}return(e,d)=>{const o=i("BaseIcon"),h=i("BaseButton"),p=i("BaseDropdownItem"),_=i("router-link"),k=i("BaseDropdown");return s(),n(k,null,{activator:t(()=>[a(v).name==="invoices.view"?(s(),n(h,{key:0,variant:"primary"},{default:t(()=>[r(o,{name:"DotsHorizontalIcon",class:"h-5 text-white"})]),_:1})):(s(),n(o,{key:1,name:"DotsHorizontalIcon",class:"h-5 text-gray-500"}))]),default:t(()=>[a(c).hasAbilities(a(m).EDIT_INVOICE)?(s(),n(_,{key:0,to:`/admin/purchases/${l.row.id}/edit`},{default:t(()=>[P(r(p,null,{default:t(()=>[r(o,{name:"PencilIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),f(" "+g(e.$t("general.edit")),1)]),_:1},512),[[j,B(l.row)]])]),_:1},8,["to"])):I("",!0),a(v).name!=="invoices.view"&&a(c).hasAbilities(a(m).VIEW_INVOICE)?(s(),n(_,{key:1,to:`/admin/purchases/${l.row.id}/view`},{default:t(()=>[r(p,null,{default:t(()=>[r(o,{name:"EyeIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),f(" "+g(e.$t("general.view")),1)]),_:1})]),_:1},8,["to"])):I("",!0),a(c).hasAbilities(a(m).DELETE_INVOICE)?(s(),n(p,{key:2,onClick:d[0]||(d[0]=z=>b(l.row.id))},{default:t(()=>[r(o,{name:"TrashIcon",class:"w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500"}),f(" "+g(e.$t("general.delete")),1)]),_:1})):I("",!0)]),_:1})}}};export{L as _};
