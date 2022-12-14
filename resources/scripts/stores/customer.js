import axios from 'axios'
import { defineStore } from 'pinia'
import { useRoute } from 'vue-router'
import { handleError } from '@/scripts/helpers/error-handling'
import { useNotificationStore } from '@/scripts/stores/notification'
import { useGlobalStore } from '@/scripts/stores/global'
import { useCompanyStore } from '@/scripts/stores/company'
import addressStub from '@/scripts/stub/address.js'
import customerStub from '@/scripts/stub/customer'
import { useCategoryStore } from '@/scripts/stores/item_client_category'

export const useCustomerStore = (useWindow = false) => {
  const defineStoreFunc = useWindow ? window.pinia.defineStore : defineStore
  const { global } = window.i18n

  return defineStoreFunc({
    id: 'customer',
    state: () => ({
      customers: [],
      totalCustomers: 0,
      selectAllField: false,
      selectedCustomers: [],
      selectedViewCustomer: {},
      isFetchingInitialSettings: false,
      isFetchingViewData: false,
      // api_end_customer: {'customer':'customers', 'purchase': 'suppliers'},
      currentCustomer: {
        ...customerStub(),
      },
    }),

    getters: {
      isEdit: (state) => (state.currentCustomer.id ? true : false),
    },

    actions: {
      resetCurrentCustomer() {
        this.currentCustomer = {
          ...customerStub(),
        }
      },

      copyAddress() {
        this.currentCustomer.shipping = {
          ...this.currentCustomer.billing,
          type: 'shipping',
        }
      },

      fetchCustomerInitialSettings(isEdit) {
        const route = useRoute()
        const globalStore = useGlobalStore()
        const companyStore = useCompanyStore()
        const categoryStore = useCategoryStore()

        this.isFetchingInitialSettings = true
        let editActions = []
        if (isEdit) {
          editActions = [this.fetchCustomer(route.params.id)]
        } else {
          this.currentCustomer.currency_id =
            companyStore.selectedCompanyCurrency.id
        }

        Promise.all([
          globalStore.fetchCurrencies(),
          globalStore.fetchCountries(),
          categoryStore.fetchCategories({'type': 'client', 'name_with_code':true}),
          ...editActions,
        ])
          .then(async ([res1, res2, res3]) => {
            this.isFetchingInitialSettings = false
          })
          .catch((error) => {
            handleError(error)
          })
      },

      getAPIendPoint(type){
        switch(type) {
          case 'purchase':
            return 'suppliers'
            break;

          default:
            return 'customers'
        }
      },

      fetchCustomers(params, type = 'customer') {
        return new Promise((resolve, reject) => {
          axios
            .get(`/api/v1/${this.getAPIendPoint(type)}`, { params })
            .then((response) => {
              // console.log(`/api/v1/${this.getAPIendPoint(type)}`)
              // console.log(response.data.data)
              this.customers = response.data.data
              this.totalCustomers = response.data.meta.total_count
              resolve(response)
            })
            .catch((err) => {
              handleError(err)
              reject(err)
            })
        })
      },

      fetchViewCustomer(params) {
        return new Promise((resolve, reject) => {
          this.isFetchingViewData = true
          axios
            .get(`/api/v1/customers/${params.id}/stats`, { params })

            .then((response) => {
              this.selectedViewCustomer = {}
              Object.assign(this.selectedViewCustomer, response.data.data)
              // console.log(this.selectedViewCustomer)
              // console.log('this.selectedViewCustomer')
              this.setAddressStub(response.data.data)
              this.isFetchingViewData = false
              resolve(response)
            })
            .catch((err) => {
              this.isFetchingViewData = false
              handleError(err)
              reject(err)
            })
        })
      },

      fetchCustomer(id) {
        return new Promise((resolve, reject) => {
          axios
            .get(`/api/v1/customers/${id}`)
            .then((response) => {
              Object.assign(this.currentCustomer, response.data.data)
              this.setAddressStub(response.data.data)
              resolve(response)
            })
            .catch((err) => {
              handleError(err)
              reject(err)
            })
        })
      },

      addCustomer(data) {
        return new Promise((resolve, reject) => {
          axios
            .post('/api/v1/customers', data)
            .then((response) => {
              this.customers.push(response.data.data)

              const notificationStore = useNotificationStore()
              notificationStore.showNotification({
                type: 'success',
                message: global.t('customers.created_message'),
              })
              resolve(response)
            })

            .catch((err) => {
              handleError(err)
              reject(err)
            })
        })
      },

      updateCustomer(data) {
        return new Promise((resolve, reject) => {
          axios
            .put(`/api/v1/customers/${data.id}`, data)
            .then((response) => {
              if (response.data) {
                let pos = this.customers.findIndex(
                  (customer) => customer.id === response.data.data.id
                )
                this.customers[pos] = data
                const notificationStore = useNotificationStore()
                notificationStore.showNotification({
                  type: 'success',
                  message: global.t('customers.updated_message'),
                })
              }
              resolve(response)
            })
            .catch((err) => {
              handleError(err)
              reject(err)
            })
        })
      },

      deleteCustomer(id) {
        const notificationStore = useNotificationStore()
        return new Promise((resolve, reject) => {
          axios
            .post(`/api/v1/customers/delete`, id)
            .then((response) => {
              let index = this.customers.findIndex(
                (customer) => customer.id === id
              )
              this.customers.splice(index, 1)
              notificationStore.showNotification({
                type: 'success',
                message: global.tc('customers.deleted_message', 1),
              })
              resolve(response)
            })
            .catch((err) => {
              handleError(err)
              reject(err)
            })
        })
      },

      deleteMultipleCustomers() {
        const notificationStore = useNotificationStore()

        return new Promise((resolve, reject) => {
          axios
            .post(`/api/v1/customers/delete`, { ids: this.selectedCustomers })
            .then((response) => {
              this.selectedCustomers.forEach((customer) => {
                let index = this.customers.findIndex(
                  (_customer) => _customer.id === customer.id
                )
                this.customers.splice(index, 1)
              })

              notificationStore.showNotification({
                type: 'success',
                message: global.tc('customers.deleted_message', 2),
              })
              resolve(response)
            })
            .catch((err) => {
              handleError(err)
              reject(err)
            })
        })
      },

      setSelectAllState(data) {
        this.selectAllField = data
      },

      selectCustomer(data) {
        this.selectedCustomers = data
        if (this.selectedCustomers.length === this.customers.length) {
          this.selectAllField = true
        } else {
          this.selectAllField = false
        }
      },

      selectAllCustomers() {
        if (this.selectedCustomers.length === this.customers.length) {
          this.selectedCustomers = []
          this.selectAllField = false
        } else {
          let allCustomerIds = this.customers.map((customer) => customer.id)
          this.selectedCustomers = allCustomerIds
          this.selectAllField = true
        }
      },

      setAddressStub(data) {
        if (!data.billing) this.currentCustomer.billing = { ...addressStub }
        if (!data.shipping) this.currentCustomer.shipping = { ...addressStub }
      },
    },
  })()
}
