/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './template-parts/**/*.php',
    './inc/**/*.php',
    './assets/js/**/*.js'
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2rem',
        xl: '2.5rem',
        '2xl': '3rem',
      },
      screens: {
        sm: '640px',
        md: '768px',
        lg: '1024px',
        xl: '1280px',
        '2xl': '1440px',
      },
    },
    extend: {
      colors: {
        primary: {
          50: '#F0F5FA',
          100: '#E1EBF5',
          200: '#C3D7EB',
          300: '#94B8DC',
          400: '#5F92CA',
          500: '#3B73B4',
          600: '#235694',
          700: '#163E70',
          800: '#0F2C52',
          900: '#0A2540',
          950: '#06182B',
          DEFAULT: '#0A2540',
          light: '#16365C',
          dark: '#06182B',
        },
        accent: {
          50: '#EBFBF4',
          100: '#CEF7E3',
          200: '#A1ECC9',
          300: '#67DBA8',
          400: '#2EC283',
          500: '#00A86B',
          600: '#00875A',
          700: '#006B47',
          800: '#005439',
          900: '#004630',
          DEFAULT: '#00875A',
          hover: '#006644',
          light: '#E3FCEF',
        },
        gold: {
          50: '#FFFBEB',
          100: '#FEF3C7',
          200: '#FDE68A',
          300: '#FCD34D',
          400: '#FBBF24',
          500: '#F59E0B',
          600: '#D97706',
          700: '#B45309',
          800: '#92400E',
          900: '#78350F',
          DEFAULT: '#D97706',
        },
        surface: {
          light: '#F8FAFC',
          card: '#FFFFFF',
          dark: '#0A192F',
          darker: '#06101E',
        }
      },
      fontFamily: {
        sans: ['Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
        heading: ['Plus Jakarta Sans', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
      },
      boxShadow: {
        'subtle': '0 1px 3px 0 rgba(15, 23, 42, 0.05)',
        'card': '0 4px 12px -2px rgba(15, 23, 42, 0.08), 0 2px 6px -1px rgba(15, 23, 42, 0.04)',
        'card-hover': '0 20px 30px -8px rgba(15, 23, 42, 0.12), 0 8px 12px -4px rgba(15, 23, 42, 0.04)',
        'float': '0 25px 50px -12px rgba(10, 37, 64, 0.18)',
      },
      borderRadius: {
        'xl': '14px',
        '2xl': '20px',
      }
    },
  },
  plugins: [],
}
