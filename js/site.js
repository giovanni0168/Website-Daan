const themeToggleBtn = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');
const body = document.body;

function applyTheme(theme) {
    const isDark = theme === 'dark';
    body.classList.toggle('dark', isDark);
    themeIcon.textContent = isDark ? '☀️' : '🌙';
    themeToggleBtn.setAttribute('aria-pressed', String(isDark));
    themeToggleBtn.setAttribute('aria-label',
        isDark ? 'Schakel naar de lichte modus' : 'Schakel naar de donkere modus');
}

if (themeToggleBtn && themeIcon) {
    let theme = 'dark';

    try {
        theme = localStorage.getItem('theme') === 'light' ? 'light' : 'dark';
    } catch {
    }

    applyTheme(theme);

    themeToggleBtn.addEventListener('click', () => {
        const nextTheme = body.classList.contains('dark') ? 'light' : 'dark';
        applyTheme(nextTheme);

        try {
            localStorage.setItem('theme', nextTheme);
        } catch {
        }
    });
}
