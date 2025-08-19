// import '@/styles/main.css'

import Alpine from 'alpinejs'

// import Scroller from '@/scripts/modules/scroller'

window.Alpine = Alpine

// window.Scroller = new Scroller()

import '@/scripts/stores'

/* Glob Imports */
import.meta.glob('@/assets/**/*.{avif,gif,jpeg,jpg,png,svg,tiff,webp}')
import.meta.glob('@components/**/*.js', { eager: true })

Alpine.start()
