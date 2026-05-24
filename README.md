Oto gotowy kod do pliku `README.md`. Zawarłem w nim jasny opis projektu, specjalną strukturę śledzenia plików (tylko foldery `audit`) oraz rygorystyczne zasady pracy z systemem Git (Git Workflow), o które prosiłeś.

Utwórz plik o nazwie **`README.md`** w głównym folderze `wp-content` (tam, gdzie masz plik `.gitignore`) i wklej do niego poniższą treść:

```markdown
# Website Audit - Dedykowany Motyw i Wtyczka WordPress

Repozytorium zawiera kod dedykowanego motywu (Theme) oraz autorskiej wtyczki (Plugin) stworzonych dla systemu WordPress. 

Repozytorium jest zainicjowane wewnątrz katalogu `wp-content/`, jednak dzięki odpowiedniej konfiguracji pliku `.gitignore`, system śledzi **wyłącznie** pliki należące do projektu `audit`. Wszystkie inne wtyczki, motywy i pliki core'owe WordPressa są ignorowane.

## 📂 Struktura Projektu

```text
wp-content/
├── .gitignore               # Konfiguracja ignorowania (śledzi tylko foldery 'audit')
├── README.md                # Dokumentacja projektu
├── plugins/
│   └── audit/               # Autorski plugin - logika biznesowa, customowe funkcje
└── themes/
    └── audit/               # Dedykowany motyw - wygląd (czysty PHP, CSS, JS)
```

---

## 🛠 Zasady współpracy (Git Workflow)

W projekcie obowiązuje ścisły przepływ pracy (Branching Strategy). **Mamy całkowity zakaz commitowania bezpośrednio do gałęzi `main` oraz `develop`.**

### Złote zasady:
1. **Gałąź `main`** - Zawiera wyłącznie stabilny kod gotowy na produkcję.
2. **Gałąź `develop`** - Gałąź integracyjna, tu lądują wszystkie ukończone funkcjonalności w celach testowych.
3. Wszystkie prace wykonujemy na osobnych gałęziach (tzw. feature branches).
4. Kod trafia do głównych gałęzi **tylko poprzez Pull Request (PR)** po przejściu **Code Review (CR)**.

### Jak rozpocząć zadanie (Krok po kroku):

**1. Zawsze startuj z aktualnego `develop`:**
```bash
git checkout develop
git pull origin develop
```

**2. Utwórz nową gałąź dla swojego zadania:**
Używaj przedrostków, np. `feature/` (dla nowych funkcji), `bugfix/` (dla błędów), `hotfix/` (dla pilnych łat na produkcji).
```bash
git checkout -b feature/nazwa-twojego-zadania
```

**3. Pisz kod i twórz logiczne commity:**
```bash
git add .
git commit -m "Opis tego, co zostało zrobione"
```

**4. Po zakończeniu pracy wypchnij gałąź na serwer:**
```bash
git push -u origin feature/nazwa-twojego-zadania
```

**5. Utwórz Pull Request (PR):**
* Wejdź na GitHub.
* Utwórz PR z Twojej gałęzi (np. `feature/nazwa-twojego-zadania`) do gałęzi `develop`.
* Poproś inną osobę z zespołu o **Code Review (CR)**.

**6. Merge:**
Jeśli Code Review jest pozytywne, PR zostaje zaakceptowany i kod trafia (merge) do gałęzi `develop`. Gałąź robocza może zostać usunięta.
```

---

### Jak dodać ten plik do repozytorium?

Kiedy już zapiszesz plik `README.md` w folderze `wp-content`, w terminalu wpisz te komendy, aby wysłać go na GitHuba:

```bash
git add README.md
git commit -m "Dodanie dokumentacji README z zasadami workflow"
git push
``` 

(*Nie musisz już pisać `-u origin main`, ponieważ połączyłeś to na stałe w poprzednim kroku. Samo `git push` od teraz wystarczy.*)
