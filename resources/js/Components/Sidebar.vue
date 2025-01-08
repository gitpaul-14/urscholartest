<template>
    <div class="lg:max-h-screen bg-white flex flex-col border-r" id="side-bar" :class="dataOpenSideBar == true ? 'side-bar-visible' : 'side-bar-close'">
      
      <!-- desktop -->
      <div class="hidden lg:flex flex-col justify-between h-full bg-white">
        <div :class="['menu-man text-left whitespace-nowrap', dataOpenSideBar ? 'px-1' : 'px-1']">
          <!-- Hamburger Icon -->
            <div class="p-1 cursor-pointer hover:bg-gray-100 hover:rounded-md flex items-center" @click="clickHamburger"
            :class="[
              dataOpenSideBar ? 'justify-between' : 'justify-center',
              'min-h-[50px]'
            ]">
            <span v-if="dataOpenSideBar" class="text-blue-900 opacity-90 font-poppins text-sm font-semibold">
              Main Menu
            </span>

            <svg width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" 
              class="w-6 h-6 pointer-events-none transition-transform duration-300 text-blue-900"
              :class="{ 'rotate-180': dataOpenSideBar }">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3 8a4 4 0 014-4h10a4 4 0 014 4v8a4 4 0 01-4 4H7a4 4 0 01-4-4V8zm13-2.5A2.5 2.5 0 0013.5 8v8a2.5 2.5 0 002.5 2.5h1a2.5 2.5 0 002.5-2.5V8A2.5 2.5 0 0017 5.5h-1zm-3.123 13A3.984 3.984 0 0112 16V8c0-.946.328-1.815.877-2.5H7A2.5 2.5 0 004.5 8v8A2.5 2.5 0 007 18.5h5.877z"></path>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.25 12a.75.75 0 01-.22.53l-2 2a.75.75 0 01-1.06-1.06L8.44 12l-1.47-1.47a.75.75 0 111.06-1.06l2 2c.141.14.22.331.22.53z"></path>
            </svg>
            </div>
          <div class="py-3 rounded-sm cursor-pointer text-blue-900 hover:bg-gray-100 hover:rounded-md">
            <Link :href="(route('coordinator.dashboard'))" class="flex items-center space-x-2 font-quicksand font-semibold pl-2 text-[16px]">
                <span class="material-symbols-rounded" style="color: #0D47A1;" v-tooltip.right="!dataOpenSideBar ? 'Dashboard' : ''">
                dashboard
                </span>
              <span v-show="dataOpenSideBar">Dashboard</span>
              </Link>
          </div>

          <!-- cascading scholarship menu -->
          <div class="relative py-3 hover:bg-gray-100 hover:rounded-md">
            <!-- Main menu item -->
            <div 
              class="flex items-center w-full justify-between font-quicksand font-semibold cursor-pointer text-blue-900 pl-0"
              @click="toggleScholarshipMenu"
            >
              <div class="flex items-center space-x-2">
                <span v-tooltip.right="'Scholarships'"></span> 
                <span class="material-symbols-rounded" style="color: #0D47A1;" v-tooltip.right="!dataOpenSideBar ? 'Scholarships' : ''">
                checkbook
                </span>
              <span v-show="dataOpenSideBar">Scholarship</span>
              </div>
              <font-awesome-icon 
                icon="fa-solid fa-chevron-right" 
                v-show="dataOpenSideBar" 
                :class="{'rotate-180': isScholarshipMenuOpen} "
                class="mr-2 transition-transform duration-200"
              />
            </div>
  
            <!-- Submenu -->
            <Transition
              enter-active-class="transition-all duration-300 ease-out"
              enter-from-class="opacity-0 -translate-x-2"
              enter-to-class="opacity-100 translate-x-0"
              leave-active-class="transition-all duration-200 ease-in"
              leave-from-class="opacity-100 translate-x-0"
              leave-to-class="opacity-0 -translate-x-2"
            >
              <div 
                v-show="isScholarshipMenuOpen" 
                class="fixed top-0 bg-white w-48 z-50 cursor-pointer"
                :style="{ top: `${menuPosition - 12}px`, left: `${sidebarWidth + 8}px` }"
              >
                <ul class="space-y-0">
                  <li v-for="(item, index) in ScholarshipItems" :key="index">
                    <Link
                      :href="item.route.name"
                      class="block px-4 py-3 text-md font-quicksand font-bold border text-blue-900 hover:bg-gray-100 transition-colors duration-200"
                    >
                      {{ item.label }}
                    </Link>
                  </li>
                </ul>
              </div>
            </Transition>
          </div>
  
          <!-- cascading scholars menu -->
          <div class="relative py-3 hover:bg-gray-100 hover:rounded-md ">
            <!-- Main menu item -->
            <div 
              class="flex items-center w-full justify-between font-quicksand font-semibold cursor-pointer text-blue-900 pl-0"
              @click="toggleScholarsMenu"
            >
              <div class="flex items-center space-x-2">
                <span v-tooltip.right="'Scholars'"></span> 
                <span class="material-symbols-rounded" style="color: #0D47A1;" v-tooltip.right="!dataOpenSideBar ? 'Scholars' : ''">
                school
                </span>
              <span v-show="dataOpenSideBar">Scholars</span>
              </div>
              <font-awesome-icon 
                icon="fa-solid fa-chevron-right" 
                v-show="dataOpenSideBar" 
                :class="{'rotate-180': isScholarsMenuOpen} "
                class="mr-2 transition-transform duration-200"
              />
            </div>
  
            <!-- Submenu -->
            <Transition
              enter-active-class="transition-all duration-300 ease-out"
              enter-from-class="opacity-0 -translate-x-2"
              enter-to-class="opacity-100 translate-x-0"
              leave-active-class="transition-all duration-200 ease-in"
              leave-from-class="opacity-100 translate-x-0"
              leave-to-class="opacity-0 -translate-x-2"
            >
              <div v-show="isScholarsMenuOpen" 
                class="fixed top-0 bg-white w-48 z-50 cursor-pointer"
                :style="{ top: `${menuPosition - 12}px`, left: `${sidebarWidth + 8}px` }">
                <ul class="space-y-0">
                  <li v-for="(item, index) in ScholarItems" :key="item.label">
                    <router-link 
                      :to="item.route" 
                      class="block px-4 py-3 text-md font-quicksand font-bold border text-blue-900 hover:bg-gray-100 transition-colors duration-200"
                    >
                      {{ item.label }}
                    </router-link>
                  </li>
                </ul>
              </div>
            </Transition>
          </div>
  
            <div class="text-blue-900 opacity-90 font-poppins text-sm font-semibold py-2 px-1 w-full" :class="{ 'opacity-0': !dataOpenSideBar }">Communication</div>

            <div class="py-3 rounded-md cursor-pointer text-blue-900 hover:bg-gray-100 hover:rounded-md">
              <Link :href="route('coordinator.messages')" class="flex items-center space-x-2 font-quicksand font-semibold pl-2 text-[16px]">
                  <span class="material-symbols-rounded" style="color: #0D47A1;" v-tooltip.right="!dataOpenSideBar ? 'Messaging' : ''">
                  forum
                  </span>
                <span v-show="dataOpenSideBar">Messaging</span>
              </Link>
            </div>
            <div class="py-3 rounded-md cursor-pointer text-blue-900 hover:bg-gray-100 hover:rounded-md">
              <router-link to="/contact" class="flex space-x-2 font-quicksand font-semibold pl-2">
                <box-icon type='solid' name='book-content' color="#0D47A1" class="icon-size"
                v-tooltip.right="!dataOpenSideBar ? 'Feed' : ''">
                    <span v-show="dataOpenSideBar"></span>
                  </box-icon>
                <span v-show="dataOpenSideBar">Feed</span>
              </router-link>
            </div>
          
            <div class="text-blue-900 opacity-90 font-poppins text-sm font-semibold py-2 px-1 w-full" :class="{ 'opacity-0': !dataOpenSideBar }">Docs</div>
              <div class="py-3 rounded-md cursor-pointer text-blue-900 hover:bg-gray-100 hover:rounded-md">
                <router-link to="/customer" class="flex space-x-2 font-quicksand font-semibold pl-2">
                  <span class="material-symbols-rounded" style="color: #0D47A1;" v-tooltip.right="!dataOpenSideBar ? 'Payouts' : ''">
                    price_check
                    </span>
                  <span v-show="dataOpenSideBar">Payouts</span>
                </router-link>
              </div>
            <div class="py-3 rounded-md cursor-pointer text-blue-900 hover:bg-gray-100 hover:rounded-md">
              <router-link to="/activation" class="flex space-x-2 font-quicksand font-semibold pl-2">
                <box-icon type='solid' name='report' color="#0D47A1" class="icon-size"
                v-tooltip.right="!dataOpenSideBar ? 'Reports' : ''">
                    <span v-show="dataOpenSideBar"></span>
                  </box-icon>
                <span v-show="dataOpenSideBar">Reports</span>
              </router-link>
            </div>
          <div class="py-3 rounded-md cursor-pointer text-blue-900 hover:bg-gray-100 hover:rounded-md">
            <div class="flex space-x-2 font-quicksand font-semibold pl-2">
              <box-icon type='solid' name='archive' color="#0D47A1" class="icon-size"
              v-tooltip.right="!dataOpenSideBar ? 'Archives' : ''">
                  <span v-show="dataOpenSideBar"></span>
                </box-icon>
              <span v-show="dataOpenSideBar">Archives</span>
            </div>
          </div>
        </div>
        <!-- <div class="menu-man text-left px-2 justify-self-end whitespace-nowrap">
          <div class="py-3 rounded-md cursor-pointer text-gray-300 hover:text-white">
            <a href="https://website-nuxt-front.vercel.app/" target="_blank" class="px-2 flex space-x-2"><span class="pi pi-question" v-tooltip.right="'About Me'"></span> <span v-show="dataOpenSideBar">About Me</span></a>
          </div>
        </div> -->
        <!-- account -->
        <div class="menu-man pb-5 w-full text-left px-2 justify-self-end">
          <!-- Dropdown Toggle Button -->
          <button id="dropdownTopButton" data-dropdown-toggle="dropdownTop" data-dropdown-placement="top" type="button"
            v-show="dataOpenSideBar" class="w-full text-white bg-blue-100 hover:bg-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-between">
            <div class="w-full flex px-1 items-center justify-between">
              <div class="justify-start flex items-center space-x-3">
                <!-- Avatar (displayed only when !dataOpenSideBar) -->
                <div class="avatar" v-show="dataOpenSideBar">
                  <div class="w-8 h-8 rounded-full ring ring-offset-2">
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"
                      alt="Avatar"
                    />
                  </div>
                </div>
                  <!-- Text (displayed only when dataOpenSideBar) -->
                <div class="flex flex-col items-start text-[12px] text-blue-900">
                  <span v-show="dataOpenSideBar">{{ $page.props.auth.user.email }}</span>
                  <span v-show="dataOpenSideBar">{{ $page.props.auth.user.usertype }}</span>
                </div>
              </div>
                <div>
                <svg
                  class="w-2.5 h-2.5 ms-3 text-blue-900"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 10 6"
                >
                  <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 5 5 1 1 5"
                  />
                </svg>
                </div>
            </div>
            
          </button>
  
          <!-- Dropdown Menu -->
          <div id="dropdownTop" class="z-10 hidden bg-gray-50 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
              aria-labelledby="dropdownTopButton">
              <li class="flex items-center space-x-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                <Link :href="route('profile.edit')" method="post" as="button" class="flex items-center space-x-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  <span class="material-symbols-rounded" style="color: black;">
                    person
                  </span>
                  <span class="font-poppins">Profile</span>
                </Link>
              </li>
              <!-- <li class="flex items-center space-x-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                <span class="material-symbols-rounded" style="color: black;">
                  logout
                </span>
                <form method="POST" :action="route('logout')" class="inline"> -->
                  <!-- @csrf -->
                  <!-- <button type="submit" class="font-poppins">
                    Logout
                  </button>
                </form>
              </li> -->
              <li class="flex items-center space-x-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                <Link :href="route('logout')" method="post" as="button" class="flex items-center space-x-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  <span class="material-symbols-rounded" style="color: black;">
                    logout
                  </span>
                  <span class="font-poppins">Logout</span>
                </Link>
              </li>
            </ul>
          </div>
  
            <!-- Dropdown Toggle Button if collapsed-->
            <button id="dropdownTopButton" data-dropdown-toggle="dropdownTopcollapsed" data-dropdown-placement="top" type="button"
              v-show="!dataOpenSideBar" class="flex justify-center w-full">
              <div class="w-full flex px-1 items-center justify-between">
                <!-- Avatar (displayed only when !dataOpenSideBar) -->
                <div class="avatar" v-show="!dataOpenSideBar">
                  <div class="w-6.5 h-6.5 rounded-full ring ring-offset-2">
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"
                      alt="Avatar"
                    />
                  </div>
                </div>
              </div>
            </button>
  
            <!-- Dropdown Menu if collapsed -->
            <div id="dropdownTopcollapsed" class="z-10 hidden bg-gray-100 divide-y divide-gray-100 rounded-lg shadow w-10 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownTopButton">
                <li class="flex items-center space-x-1 px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  <Link :href="route('profile.edit')" method="post" as="button">
                    <span class="material-symbols-rounded" style="color: black;" v-tooltip.right="!dataOpenSideBar ? 'Account' : ''">
                      person
                    </span>
                  </Link>
                </li>
                <li class="flex items-center space-x-1 px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  <Link :href="route('logout')" method="post" as="button">
                    <span class="material-symbols-rounded" style="color: black;" v-tooltip.right="!dataOpenSideBar ? 'Logout' : ''">
                      logout
                    </span>
                  </Link>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
    <!-- Mobile -->
    <div class="w-full lg:hidden flex items-center bg-white px-4 py-2 overflow-x-auto scrollbar-hidden">
        <!-- Sidebar and Navigation Section -->
        <div class="w-full flex flex-row items-center space-x-6">
          <!-- Dashboard Link -->
          <div class="flex items-center cursor-pointer">
            <Link :href="route('coordinator.dashboard')" class="flex items-center space-x-2 text-blue-900 font-quicksand font-semibold">
              <span class="material-symbols-rounded text-[24px]" style="color: #0D47A1;" v-tooltip.right="'Dashboard'">
                dashboard
              </span>
              <span>Dashboard</span>
            </Link>
          </div>

          <!-- Messaging Link -->
          <div class="flex items-center cursor-pointer">
            <Link :href="route('coordinator.messages')" class="flex items-center space-x-2 text-blue-900 font-quicksand font-semibold">
              <span class="material-symbols-rounded text-[24px]" style="color: #0D47A1;" v-tooltip.right="'Messaging'">
                forum
              </span>
              <span>Messaging</span>
            </Link>
          </div>

          <!-- Feed Link -->
          <div class="flex items-center cursor-pointer">
            <router-link to="/contact" class="flex space-x-2 font-quicksand font-semibold">
              <box-icon type='solid' name='book-content' color="#0D47A1" class="icon-size" v-tooltip.right="'Feed'"></box-icon>
              <span>Feed</span>
            </router-link>
          </div>

          <!-- Payouts Link -->
          <div class="flex items-center cursor-pointer">
            <router-link to="/customer" class="flex space-x-2 font-quicksand font-semibold">
              <span class="material-symbols-rounded" style="color: #0D47A1;" v-tooltip.right="'Payouts'">
                price_check
              </span>
              <span>Payouts</span>
            </router-link>
          </div>

          <!-- Reports Link -->
          <div class="flex items-center cursor-pointer">
            <router-link to="/activation" class="flex space-x-2 font-quicksand font-semibold">
              <box-icon type='solid' name='report' color="#0D47A1" class="icon-size" v-tooltip.right="'Reports'"></box-icon>
              <span>Reports</span>
            </router-link>
          </div>

          <!-- Archives Link -->
          <div class="flex items-center cursor-pointer">
            <div class="flex space-x-2 font-quicksand font-semibold">
              <box-icon type='solid' name='archive' color="#0D47A1" class="icon-size" v-tooltip.right="'Archives'"></box-icon>
              <span>Archives</span>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
import { ref, onMounted } from 'vue'
import { Tooltip } from 'primevue';
import { Link } from '@inertiajs/vue3';

export default {
  components: {
    Link,
  },
  props: {
    dataOpenSideBar: Boolean,
    clickHamburger: Function
  },
  directives: {
    tooltip: Tooltip
  },
  methods: {
    toggle(event) {
      this.$refs.menu.toggle(event);
    },
  },
  // for cascading menu
  setup() {
    const isScholarshipMenuOpen = ref(false)
    const isScholarsMenuOpen = ref(false)
    const menuPosition = ref(0)
    const sidebarWidth = ref(0)

    const ScholarshipItems = [
      { label: 'Add Sponsors', route: { name: route('scholarships.index'), active: 'scholarships.index' }, },
      { label: 'View Scholarships', route: '/scholarships/add' },
      // { label: 'View Scholarships', route: route('scholarships.index') },
      { label: 'Archives', route: '/scholarships/add' }
    ]

    const ScholarItems = [
      { label: 'View Scholars', route: '/scholars/view' },
      { label: 'Add Scholars', route: '/scholars/add' }
    ]

    const toggleScholarshipMenu = (event) => {
      // Calculate position relative to viewport
      const rect = event.currentTarget.getBoundingClientRect()
      menuPosition.value = rect.top
      sidebarWidth.value = rect.width // Adjust this value based on the actual width of the sidebar
      isScholarshipMenuOpen.value = !isScholarshipMenuOpen.value
    }

    const toggleScholarsMenu = (event) => {
      // Calculate position relative to viewport
      const rect = event.currentTarget.getBoundingClientRect()
      menuPosition.value = rect.top
      sidebarWidth.value = rect.width // Adjust this value based on the actual width of the sidebar
      isScholarsMenuOpen.value = !isScholarsMenuOpen.value
    }

    // Close menu when clicking outside
    onMounted(() => {
      document.addEventListener('click', (event) => {
      const target = event.target
      if (!target.closest('.relative')) {
        isScholarshipMenuOpen.value = false
        isScholarsMenuOpen.value = false
      }
      })
    })

    return {
      isScholarshipMenuOpen,
      isScholarsMenuOpen,
      menuPosition,
      ScholarshipItems,
      toggleScholarshipMenu,
      sidebarWidth,
      toggleScholarsMenu,
      ScholarItems
    }
  }
}
</script>

<style>
:root {
  --sidebar-width: 230px; /* Adjust this value to match your sidebar width */
}

.side-bar-visible {
  width: var(--sidebar-width) !important;
}

.p-tooltip-text {
  margin-left: 10px;
  font-size: 13px !important;
}

#side-bar {
  overflow: hidden;
  transition: 300ms;
}

.side-bar-close {
  width: 50px !important;
}

.icon-size {
  width: 22px;
  height: 22px;
}
</style>
  
  