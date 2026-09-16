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
        DEFAULT: '1.25rem',
        sm: '1.5rem',
        lg: '2rem',
        xl: '3rem',
        '2xl': '4rem',
      },
      screens: {
        sm: '640px',
        md: '768px',
        lg: '1024px',
        xl: '1280px',
        '2xl': '1400px',
      },
    },
    extend: {
      colors: {
        // Luxury Private Investment Palette
        brand: {
          canvas: '#FAFAF7',        // Warm Ivory / Soft Neutral (85-90% of page)
          surface: '#FFFFFF',       // Pure white card/panel
          subtle: '#F4F4EE',        // Very subtle background tint
          dark: '#123F3D',          // Darkest forest charcoal (primary text)
          teal: '#0A4A46',          // Deep muted forest teal (primary brand)
          'teal-hover': '#073532',  // Deep hover
          'teal-light': '#E9F2F1',  // Soft brand wash
          impact: '#0A3D36',        // Dark impact section background
          sand: '#C59B27',          // Restrained warm sand / muted gold accent
          'sand-light': '#FAF5E8',  // Soft gold tint
          border: '#E8E8E3',        // Ultra-quiet hairline border
          'border-dark': '#C9C9C2', // Active input / border
          muted: '#66706F',         // Secondary descriptive text
          light: '#8F9998',         // Subtle captions & dates
        },
        primary: {
          DEFAULT: '#0A4A46',
          light: '#123F3D',
          dark: '#073532',
        },
        accent: {
          DEFAULT: '#0A4A46',
          hover: '#073532',
          light: '#E9F2F1',
        },
        gold: {
          DEFAULT: '#C59B27',
          light: '#FAF5E8',
        }
      },
      fontFamily: {
        serif: ['Playfair Display', 'Newsreader', 'Georgia', 'serif'],
        sans: ['Plus Jakarta Sans', 'Inter', '-apple-system', 'BlinkMacSystemFont', 'sans-serif'],
        heading: ['Playfair Display', 'Newsreader', 'Georgia', 'serif'],
      },
      boxShadow: {
        'quiet': '0 1px 2px 0 rgba(18, 63, 61, 0.03)',
        'panel': '0 4px 20px -2px rgba(18, 63, 61, 0.05)',
        'float-quiet': '0 12px 28px -4px rgba(18, 63, 61, 0.08)',
      },
      letterSpacing: {
        'tightest': '-0.03em',
        'tighter': '-0.02em',
        'widest-plus': '0.12em',
      },
      aspectRatio: {
        '4/3': '4 / 3',
        '16/10': '16 / 10',
        '3/2': '3 / 2',
      }
    },
  },
  plugins: [],
}
