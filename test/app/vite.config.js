import { resolve } from 'path'
import { defineConfig } from 'vite'
import WordpressPlugin from 'vite-plugin-wordpress'

const THEME_PATH = 'public/wp-content/themes/demo'

export default defineConfig(({ mode }) => ({
  root: resolve(process.cwd(), THEME_PATH),
  base: mode === 'production' ? '/wp-content/themes/demo/dist/' : '/',
  server: {
    cors: true,
  },
  build: {
    manifest: true,
    // sourcemap: true,
    rollupOptions: {
      input: [
        resolve(process.cwd(), `${THEME_PATH}/src/scripts/main.js`),
        resolve(process.cwd(), `${THEME_PATH}/src/styles/main.css`),
      ],
    },
  },
  plugins: [
    WordpressPlugin({
      watch: true,
      devDir: resolve(process.cwd(), THEME_PATH),
      wordpressConfigDir: 'public',
    }),
  ],
  resolve: {
    alias: {
      '@': resolve(process.cwd(), `${THEME_PATH}/src`),
      '@components': resolve(process.cwd(), `${THEME_PATH}/components`),
    },
  },
}))
