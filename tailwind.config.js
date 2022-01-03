// tailwind.config.js
module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            spacing: {
                150: '37.6rem'
            },
            color: {
                "pale-black": "rgba(200, 200, 200, 0.5)",
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
